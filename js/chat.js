var count = 0;
const commentBoxMsg = "This is a comment which is can be edited by double-clicking. All blocks support [MarkDown](https://daringfireball.net/projects/markdown/). Click the **GENERATE** button to get the answer from GPT3.5\n \n - Add block below please click the `add` button. \n - Delete block please click the `delete` button \n - Block type can be changed by expanding the menu on the left \n - Comments are ignored when submiting to API. \n - System prompts target to guide GPT3.5 to generate what you want.";
const systemBoxMsg = "This is a system prompt, double-click to edit me.";
const userBoxMsg = "**This is where you put your questions, double-click to edit me.**";
const assistantBoxMsg = "This is where answers are generated.";
// message: [role, content, id, timestamp, cost tokens]
var message = {
  "id": [],
  "role": [],
  "content": [],
  "timestamp": [],
};
const iconDict = {
  "user": "face",
  "assistant": "chat",
  "system": "settings",
  "error": "error",
  "comment": "edit_note"
};
const md = new markdownit({
  linkify: true, // Autoconvert URLs into links
  // typographer: true, // Enable smartypants and other typographic replacements
  highlight: function (str, lang) {
    if (lang && hljs.getLanguage(lang)) {
      try {
        return `<pre class="hljs"><code>${hljs.highlight(lang, str, true).value}</code></pre>`;
      } catch (__) {
        console.log("catch __ in line 26.")
      }
    } else {
      return `<pre class="hljs"><code>${hljs.highlightAuto(str).value}</code></pre>`;
    }
    return `<pre class="hljs"><code>${md.utils.escapeHtml(str)}</code></pre>`;
  }
});
md.use(window.markdown_katex);
$(document).ready(async function () {
  // await createBox("comment", commentBoxMsg, -1);
  await createBox("system", systemBoxMsg, -1);
  await createBox("user", userBoxMsg, -1);
  await createBox("assistant", assistantBoxMsg, -1);
});

function switchTo(index_, boxClass) {
  const box = $("#box_id" + index_);
  const btn = $("#headline_iconbtn_id" + index_);
  message["role"][message["id"].indexOf(String(index_))] = boxClass;
  btn.html(`<i class='material-icons'>${iconDict[boxClass]}</i>`)
  box.removeClass("userBox systemBox assistantBox commentBox errorBox");
  box.addClass(boxClass + "Box");
  console.log(message);
}

function makeNonEditable(index_) {
  const textarea = $("#content_id" + index_);
  const i = message["id"].indexOf(textarea.attr("index_"));
  const text = textarea.val();
  const div = $('<div>', {
    id: textarea.attr("id"),
    ondblclick: `makeEditable(${index_})`,
    index_: textarea.attr("index_"),
    hiddenText: text,
    html: md.render(text),
  });
  message["content"][i] = text;
  textarea.replaceWith(div);
  console.log(message);
}

function makeEditable(index_) {
  const div = $("#content_id" + index_);
  const textarea = $('<textarea>', {
    val: div.attr("hiddenText"),
    id: div.attr("id"),
    index_: div.attr("index_"),
    onblur: `makeNonEditable(${index_})`,
    hiddenText: div.attr("hiddenText"),
    keydown: function () {
      //Auto-expanding textarea
      this.style.removeProperty('height');
      this.style.height = (this.scrollHeight + 10) + 'px';
    },
    focus: function () {
      //Do this on focus, to allow textarea to animate to height...
      this.style.removeProperty('height');
      this.style.height = (this.scrollHeight + 10) + 'px';
    }
  });
  div.replaceWith(textarea);
  textarea.focus();
}

async function createBox(boxClass, text, atwhere) {
  // create headline on the top.
  const headline = $("<div>", {
    id: "headline_id" + count,
    class: "head-line"
  });
  // create icons
  const icon1 = $('<span>', {
    class: 'material-icons option-icons',
    text: 'face'
  })
  const icon2 = $('<span>', {
    class: 'material-icons option-icons',
    text: 'settings'
  })
  const icon3 = $('<span>', {
    class: 'material-icons option-icons',
    text: 'chat'
  })
  const icon4 = $('<span>', {
    class: 'material-icons option-icons',
    text: 'edit_note'
  })
  // create the button using the MaterialButton function
  const classBtn = $('<button>', {
    id: "headline_iconbtn_id" + count,
    class: 'mdl-button mdl-js-button mdl-button--icon'
  }).append($('<span>', {
    class: 'material-icons',
    text: iconDict[boxClass]
  }));
  const deleteBtn = $('<button>', {
    id: "deletebtn_id" + count,
    class: 'mdl-button mdl-js-button mdl-button--icon right-float-icons',
    onclick: `deleteBox(${count});`
  }).append($('<span>', {
    class: 'material-icons',
    text: "delete"
  }));
  const editBtn = $('<button>', {
    id: "editbtn_id" + count,
    class: 'mdl-button mdl-js-button mdl-button--icon right-float-icons',
    onclick: `makeEditable(${count})`
  }).append($('<span>', {
    class: 'material-icons',
    text: "edit"
  }));
  const addBtn = $('<button>', {
    id: "addbtn_id" + count,
    class: 'mdl-button mdl-js-button mdl-button--icon right-float-icons',
    onclick: `addBox(${count})`
  }).append($('<span>', {
    class: 'material-icons',
    text: "add"
  }));
  // create the menu using the MaterialMenu function
  const menu = $('<ul>', {
    class: 'mdl-menu mdl-menu--bottom-left mdl-js-menu mdl-js-ripple-effect',
    for: "headline_iconbtn_id" + count,
  }).append(
    $('<li>', {
      class: 'mdl-menu__item',
      onclick: `switchTo(${count}, 'user')`,
      text: 'User'
    }).prepend(icon1),
    $('<li>', {
      class: 'mdl-menu__item',
      onclick: `switchTo(${count}, 'system')`,
      text: 'System'
    }).prepend(icon2),
    $('<li>', {
      class: 'mdl-menu__item',
      onclick: `switchTo(${count}, 'assistant')`,
      text: 'Assistant'
    }).prepend(icon3),
    $('<li>', {
      class: 'mdl-menu__item',
      onclick: `switchTo(${count}, 'comment')`,
      text: 'Comment'
    }).prepend(icon4),
  );
  const tipsForDelete = $('<div>', {
    class: "mdl-tooltip",
    for: "deletebtn_id" + count,
    text: "Delete that block"
  });
  const tipsForEdit = $('<div>', {
    class: "mdl-tooltip",
    for: "editbtn_id" + count,
    text: "Edit that block"
  });
  const tipsForAdd = $('<div>', {
    class: "mdl-tooltip",
    for: "addbtn_id" + count,
    text: "Add a new block below"
  });
  // append the button and menu to the div with class "head-line"
  headline.append(
    classBtn,
    menu,
    addBtn,
    tipsForAdd,
    deleteBtn,
    tipsForDelete,
    editBtn,
    tipsForEdit,
  );
  // create content container
  content = $('<div>', {
    id: 'content_id' + count,
    index_: count,
    ondblclick: `makeEditable(${count})`,
    hiddenText: text,
  });
  // create the div box
  const box = $('<div>', {
    index_: count,
    id: 'box_id' + count,
    class: "mdl-cell mdl-cell--12-col mdl-shadow--2dp",
  }).addClass(boxClass + "Box");
  box.append(headline).append(content);
  if (atwhere == -1) {
    message["role"].push(boxClass);
    message["content"].push(text);
    message["id"].push(String(count));
    message["timestamp"].push(Date.now());
    $("#conversation_container").append(box);
    // split text into words and add each words to the content div
    let words = text.split(" ");
    for (let i = 1; i <= words.length; i++) {
      content.html(md.render(words.slice(0, i).join(" ")));
      await sleep(50);
    }
  } else {
    content.html(md.render(text));
    message["role"].splice(atwhere + 1, 0, boxClass);
    message["content"].splice(atwhere + 1, 0, text);
    message["id"].splice(atwhere + 1, 0, String(count));
    message["timestamp"].splice(atwhere + 1, 0, Date.now());
    $("#box_id" + message["id"][atwhere]).after(box);
  }
  componentHandler.upgradeDom();
  count++;
}

function submit() {
  // add loading effect
  const loading = $('<div>', {
    id: "loading",
    class: "mdl-progress mdl-js-progress mdl-progress__indeterminate",
  });
  $("#conversation_container").append(loading);
  componentHandler.upgradeDom();

  const roles = message["role"];
  const contents = message["content"];
  let processedMsg = [];
  for (let i = 0; i < message["id"].length; i++) {
    if ((roles[i] === "user" || roles[i] === "system" || roles[i] === "assistant") &&
      (contents[i] != "*write something here*") &&
      (contents[i] != commentBoxMsg) &&
      (contents[i] != systemBoxMsg) &&
      (contents[i] != userBoxMsg) &&
      (contents[i] != assistantBoxMsg)
    ) {
      processedMsg.push({
        role: roles[i],
        content: contents[i]
      });
    }
  }
  const apikey = $("#apikey_id").val().trim();
  let resp_message = "NetworkError when attempting to fetch resource.";
  if (apikey.length > 0) {
    console.log("Get your apikey:", apikey);
    fetch('https://api.openai.com/v1/chat/completions/', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Authorization': 'Bearer ' + apikey
      },
      body: JSON.stringify({
        'model': 'gpt-3.5-turbo',
        'messages': processedMsg,
      })
    }).then((response) => response.json()).then((result) => {
      resp_message = result;
      createBox("assistant", result.choices[0].message.content, -1);
      loading.remove();
    }).catch((error) => {
      resp_message['messages'] = processedMsg;
      console.error("Severe Error!", error);
      loading.remove();
      createBox("error", `
You give your own api key.

But we have caught a network issue.

**Please make sure you are able to visit https://api.openai.com**, then try again !

\`\`\`json
${JSON.stringify(resp_message, undefined, 2)}
\`\`\``, -1);
    });
  }
  else {
    fetch('http://34.124.153.74/request.php', {
      method: 'POST',
      body: JSON.stringify({
        'model': 'gpt-3.5-turbo',
        'messages': processedMsg,
      })
    }).then((response) => response.json()).then((result) => {
      resp_message = result;
      createBox("assistant", result.choices[0].message.content, -1);
      loading.remove();
    }).catch((error) => {
      resp_message['messages'] = processedMsg;
      console.error("severe error!", error);
      loading.remove();
      createBox("error", `
We have caught a network issue. Please try again !

\`\`\`json
${JSON.stringify(resp_message, undefined, 2)}
\`\`\``, -1);
    });
  }
}

function addBox(index_) {
  const i = message["id"].indexOf(String(index_));
  createBox("user", "*write something here*", i);
  console.log(message);
}

function deleteBox(index_) {
  const i = message["id"].indexOf(String(index_));
  message["role"].splice(i, 1);
  message["content"].splice(i, 1);
  message["id"].splice(i, 1);
  message["timestamp"].splice(i, 1);
  $("#box_id" + index_).remove();
  console.log(message);
}

function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

function openSettings() {
  $("#settings_form_id").addClass("open");
}

function closeSettings() {
  $("#settings_form_id").removeClass("open");
}

// function fetchApiResponse(apikey, msg) {
//   let code = 2;
//   let message = "Unknown Issue!";
//   let token_usage = -1;
//   if (apikey.length > 0) {
//     return { 'code': code, 'message': message, 'token_usage': token_usage };
//   }
//   fetch('http://34.124.153.74/request.php', {
//     method: 'POST',
//     body: JSON.stringify({
//       'model': 'gpt-3.5-turbo',
//       'messages': msg,
//     })
//   }).then((response) => response.json()
//   ).then((result) => {
//     console.log("get response successfully:", result);
//     message = result.choices[0].text;
//     code = 0;
//     token_usage = result.usage.total_tokens;
//     const ret = { 'code': code, 'message': message, 'token_usage': token_usage };
//     console.log("return:", ret);
//     return ret;
//   }).catch((error) => {
//     console.error("severe error!", error);
//     code = 1;
//     message = `
// We have caught a network issue. Please try again !

// \`\`\`json
// ${JSON.stringify(message, undefined, 2)}
// \`\`\``
//     const ret = { 'code': code, 'message': message, 'token_usage': token_usage };
//     console.log("return:", ret);
//     return ret;
//   });
// }

function copyMarkdown() {
  const getTitle = () => {
    return "# Title\n\n";
  };

  const messageToString = (message) => {
    const title = getTitle();
    let conversation = "";
    for (let i = 0; i < message["id"].length; i++) {
      let timestamp = new Date(message["timestamp"][i]).getTime();
      let formattedTimestamp = `${new Date(timestamp).toLocaleString()} (${timestamp})`;
      conversation += `## ${message["role"][i]} on ${formattedTimestamp}\n\n${msg[1][i]}\n\n`;
    }
    return `${title}${conversation}`;
  };

  const markdownedMsg = messageToString(message);
  navigator.clipboard.writeText(markdownedMsg)
    .then(() => console.log('MarkDowned conversation copied to clipboard successfully.'))
    .catch(err => console.error('Failed to copy text: ', err));
}
