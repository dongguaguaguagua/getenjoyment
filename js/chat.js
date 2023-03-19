var count = 0;
var message = [[], [], []];
const iconDict = { "user": "face", "assistant": "chat", "system": "settings", "error": "error", "comment": "edit_note" };
const md = new markdownit({
  linkify: true, // Autoconvert URLs into links
  // typographer: true, // Enable smartypants and other typographic replacements
  // quotes: '“”‘’',
  highlight: function(str, lang) {
    if (lang && hljs.getLanguage(lang)) {
      try {
        return '<pre class="hljs"><code>' +
          hljs.highlight(lang, str, true).value +
          '</code></pre>';
      } catch (__) {}
    } else {
      return '<pre class="hljs"><code>' +
        hljs.highlightAuto(str).value +
        '</code></pre>';
    }
    return '<pre class="hljs"><code>' + md.utils.escapeHtml(str) + '</code></pre>';
  }
});

$(document).ready(function() {
  createBox("comment", "This is a comment which is can be edited by double-click. All blocks support [MarkDown](https://daringfireball.net/projects/markdown/). Click the **GENERATE** button to get the answer from GPT3.5\n \n - Add block below please click the `add` button. \n - Delete block please click the `delete` button \n - Block type can be changed by expanding the menu on the left \n - Comments are ignored when submiting to API. \n - System prompts target to guide GPT3.5 to generate what you want.", -1);
  createBox("system", "This is a system prompt, double-click to edit me.", -1);
  createBox("user", "**This is where you put your questions, double-click to edit me.**", -1);
  createBox("assistant", "This is where answers are generated.", -1);
});

function switchTo(element, index_, boxClass) {
  const box = $("#box_id" + index_);
  const btn = $("#headline_iconbtn_id" + index_);
  message[0][message[2].indexOf(String(index_))] = boxClass;
  btn.html("<i class='material-icons'>" + iconDict[boxClass] + "</i>")
  box.removeClass("userBox systemBox assistantBox commentBox errorBox");
  box.addClass(boxClass + "Box");
  console.log(message);
}

function makeNonEditable(element) {
  const textarea = $("#" + element.id);
  const i = message[2].indexOf(textarea.attr("index_"));
  const text = textarea.val();
  const htmlStrinng = md.render(text);
  const div = $('<div>', {
    id: textarea.attr("id"),
    ondblclick: 'makeEditable(this)',
    index_: textarea.attr("index_"),
    hiddenText: text,
    html: htmlStrinng,
  });
  message[1][i] = text;
  textarea.replaceWith(div);
  console.log(message);
}

function makeEditable(element) {
  const div = $("#" + element.id);
  const textarea = $('<textarea>', {
    val: div.attr("hiddenText"),
    id: div.attr("id"),
    index_: div.attr("index_"),
    onblur: 'makeNonEditable(this)',
    hiddenText: div.attr("hiddenText"),
    keydown: function() {
      //Auto-expanding textarea
      this.style.removeProperty('height');
      this.style.height = (this.scrollHeight + 10) + 'px';
    },
    focus: function() {
      //Do this on focus, to allow textarea to animate to height...
      this.style.removeProperty('height');
      this.style.height = (this.scrollHeight + 10) + 'px';
    }
  });
  div.replaceWith(textarea);
  textarea.focus();
}

function createBox(boxClass, text, atwhere) {
  // create headline on the top.
  const headline = $("<div>", {
    id: "headline_id" + count,
    class: "head-line"
  });
  // create icons
  const icon1 = $('<i>', {
    class: 'material-icons option-icons',
    text: 'face'
  })
  const icon2 = $('<i>', {
    class: 'material-icons option-icons',
    text: 'settings'
  })
  const icon3 = $('<i>', {
    class: 'material-icons option-icons',
    text: 'chat'
  })
  const icon4 = $('<i>', {
    class: 'material-icons option-icons',
    text: 'edit_note'
  })

  // create the button using the MaterialButton function
  const classBtn = $('<button>', {
    id: "headline_iconbtn_id" + count,
    class: 'mdl-button mdl-js-button mdl-button--icon'
  }).append($('<i>', {
    class: 'material-icons',
    text: iconDict[boxClass]
  }));
  const deleteBtn = $('<button>', {
    id: "deletebtn_id" + count,
    class: 'mdl-button mdl-js-button mdl-button--icon right-float-icons',
    onclick: 'deleteBox(' + count + ');'
  }).append($('<i>', {
    class: 'material-icons',
    text: "delete"
  }));
  const addBtn = $('<button>', {
    id: "addbtn_id" + count,
    class: 'mdl-button mdl-js-button mdl-button--icon right-float-icons',
    onclick: 'addBox(' + count + ');'
  }).append($('<i>', {
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
      onclick: "switchTo(this, " + count + ", 'user');",
      text: 'User'
    }).prepend(icon1),
    $('<li>', {
      class: 'mdl-menu__item',
      onclick: "switchTo(this, " + count + ", 'system');",
      text: 'System'
    }).prepend(icon2),
    $('<li>', {
      class: 'mdl-menu__item',
      onclick: "switchTo(this, " + count + ", 'assistant');",
      text: 'Assistant'
    }).prepend(icon3),
    $('<li>', {
      class: 'mdl-menu__item',
      onclick: "switchTo(this, " + count + ", 'comment');",
      text: 'Comment'
    }).prepend(icon4),
  );
  // append the button and menu to the div with class "head-line"
  headline.append(classBtn, menu, addBtn, deleteBtn);
  // create content container
  const htmlStrinng = md.render(text);
  content = $('<div>', {
    id: 'content_id' + count,
    index_: count,
    ondblclick: 'makeEditable(this)',
    hiddenText: text,
    html: htmlStrinng,
  });
  // create the div box
  const box = $('<div>', {
    index_: count,
    id: 'box_id' + count,
    class: "mdl-cell mdl-cell--12-col mdl-shadow--2dp",
  }).addClass(boxClass + "Box");
  box.append(headline).append(content);
  if (atwhere == -1) {
    message[0].push(boxClass);
    message[1].push(text);
    message[2].push(String(count));
    $("#conversation_container").append(box);
  } else {
    message[0].splice(atwhere + 1, 0, boxClass);
    message[1].splice(atwhere + 1, 0, text);
    message[2].splice(atwhere + 1, 0, String(count));
    $("#box_id" + message[2][atwhere]).after(box);
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

  const roles = message[0];
  const contents = message[1];
  const processedMsg = [];

  for (let i = 0; i < message[2].length; i++) {
    if ((roles[i] === "user" || roles[i] === "system" || roles[i] === "assistant")
      && (contents[i] != "This is a system prompt, double-click to edit me.")
      && (contents[i] != "This is where answers are generated.")
      && (contents[i] != "*write something here*")
      && (contents[i] != "This is a comment which is can be edited by double-click. All blocks support [MarkDown](https://daringfireball.net/projects/markdown/). Click the **GENERATE** button to get the answer from GPT3.5\n \n - Add block below please click the `add` button. \n - Delete block please click the `delete` button \n - Block type can be changed by expanding the menu on the left \n - Comments are ignored when submiting to API. \n - System prompts target to guide GPT3.5 to generate what you want.")
      ) {
      processedMsg.push({
        role: roles[i],
        content: contents[i]
      });
    }
  }

  console.log(JSON.stringify({
    'messages': processedMsg,
  }));
  // const url = `http://34.142.198.190/request.php?messages=${encodeURIComponent(
  //   JSON.stringify(processedMsg)
  // )}`;
  // fetch(url, {
  //   method: "GET",//请求方式
  //   headers: {//定制http请求的标头
  //     "Content-Type": "application/json",
  //     "Access-Control-Allow-Origin": "*",
  //     "Access-Control-Allow-Headers": "*"
  //   }
  // })
  //   .then((response) => response.json())
  //   .then((data) => {
  //     console.log(data);
  //     assistantResponce = data.choices[0].message;
  //     console.log("get response successfully:\n", assistantResponce.content);
  //     createBox("assistant", assistantResponce.content, -1);
  //     loading.remove();
  //   })
  //   .catch((error) => {
  //     console.log("failed!")
  //     createBox("error", "NetWork Error! Please try it again.", -1);
  //     console.error(error);
  //     loading.remove();
  //   });

  fetch(' ', {
    method: 'POST',
    body: JSON.stringify({
      'model': 'gpt-3.5-turbo',
      'messages': processedMsg,
    })
  }).then((response) => response.json()).then((result) => {
    assistantResponce = result.choices[0].message;
    console.log("get response successfully:", assistantResponce.content)
    createBox("assistant", assistantResponce.content, -1);
    loading.remove();
  }).catch((error) => {
    console.error(error);
    createBox("error", "NetWork Error! Please try it again.", -1);
    console.error(error);
    loading.remove();
  });
}

function addBox(index_) {
  const i = message[2].indexOf(String(index_));
  createBox("user", "*write something here*", i);
  console.log(message);
}

function deleteBox(index_) {
  const i = message[2].indexOf(String(index_));
  message[0].splice(i, 1);
  message[1].splice(i, 1);
  message[2].splice(i, 1);
  $("#box_id" + index_).remove();
  console.log(message);
}
