/* Post its */

function toggle_save(id) {
  var x = document.getElementById("button_"+id);
  if (x.style.display === "block") {
    setTimeout(function(){
      // console.log(id);
      x.style.display = "none";
    },200);

  } else {
    x.style.display = "block";
  }
}

/* Randomization */

function set_question(question) {
  let title=document.createElement("h2");
  title.innerHTML=question;

  document.getElementById('question').appendChild(title);
}

/* Pop ups */


function popupQuestionnaire(){
  // console.log("position: "+localStorage.getItem("position"));
  if(localStorage.getItem("position")!=2 && localStorage.getItem("popup")==0){
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
  } else if (localStorage.getItem("popup")==0){
    popupExplanation();
  }
}

function closePopup(){
  var modal = document.getElementById("myModal");
  modal.style.display = "none";
  popupExplanation();
}

function popupExplanation() {
  var modal = document.getElementById("myModal2");
  var counter_popup = parseInt(document.getElementById("assistant").value);
  var keyword = document.getElementById("keyword").value;
  // console.log(counter_popup);
  switch(counter_popup){
    case 0:
      content='<h1 class="title is-4" id="popup_title">Bildersuche</h1>'+
      '<p>Der Assistent "Bildersuche" soll <strong>visuelle Inspiration</strong> beim Brainstormen liefern, indem der <strong>erste Begriff jeder Ihrer Ideen</strong> automatisch visualiert wird.<br/>'+
      'Außerdem können Sie auch nach Belieben manuell eine Bildersuche starten.</p>';
      break;
    case 1:
      content='<h1 class="title is-4" id="popup_title">Chatbot</h1>'+
      '<p>Der Assistent "Chatbot" schlägt mehrere <strong>Gedankenübungen</strong> vor, um neue Perspektiven auf das Problem zu entwickeln.<br/>'+
      'Sie können generelle Gedankenübungen auswählen, wenn Ihnen keine Ideen mehr einfallen, oder mit dem Chatbot über ein konkretes Problem reflektieren.</p>';
      break;
    case 2:
      content='<h1 class="title is-4" id="popup_title">Kein Assistent</h1>'+
      '<p>Für dieses Brainstorming gibt es <strong>keinen Assistenten</strong>. Notieren Sie einfach Ihre Ideen auf dem gelben Post-it.</p>';
      break;
    case 3:
      content='<h1 class="title is-4" id="popup_title">Assoziationscluster</h1>'+
      '<p>Der Assistent "Assoziationscluster" erstellt <strong>semantische Cluster</strong>, die mit dem <strong>Schlüsselbegriff</strong> in der Mitte des Clusters assoziiert sind.<br/><br/>'+
      'Der erste Schlüsselbegriff basiert auf der Fragestellung, zu der Sie brainstormen (z.B. '+keyword+'). Sie können einen beliebigen neuen Schlüsselbegriff setzen, indem Sie auf die Assoziationen um den Schlüsselbegriff klicken.<br/>'+
      'Zusätzlich zum Assoziationscluster wird anhand des Schlüsselbegriffs eine <strong>Google Suche</strong> durchgeführt, deren Ergebnisse unter dem Cluster visualisiert sind.</p>';
      break;
    default:
      content='Unerwarteter Fall. Wenden Sie sich bitte an die Versuchsleiterin!'
      break;
    }

  document.getElementById("content_modal").innerHTML= content;
  modal.style.display = "block";
  localStorage.setItem("popup",1);

}

function closePopup2(){
  var modal = document.getElementById("myModal2");
  modal.style.display = "none";
}

function change_button(){
  if (document.getElementById("popup_weiter_wait")!=undefined) {
    var popup= document.getElementById("popup_weiter_wait");

    setTimeout(function(){
      popup.style.color="white";
      popup.style.background="var(--primary-color)";
      popup.style.cursor="pointer";
    }, 10000)
  }

}


/* Picture bot */

function pictures_api() {
  var API_KEY = '6744727-10a66348ecd65e24c927d55b6';

  if (document.getElementById('search_pic').value=="") {
    if(localStorage.getItem('pic_manual_search')!=null){
      var search_term = localStorage.getItem('pic_manual_search');
      document.getElementById('search_pic').value = search_term;
    } else {
      return ;
    }

  } else {
    var search_term = document.getElementById('search_pic').value;
    localStorage.setItem('pic_manual_search', search_term);
  }

  // console.log(document.getElementById("search_pic"));
  // console.log(search_term);



  var URL = "https://pixabay.com/api/?key="+API_KEY+"&q="+encodeURIComponent(search_term)+"&per_page=100";
  $.getJSON(URL, function(data){
    document.getElementById('pictures_bot').innerHTML="";
    if (parseInt(data.totalHits) > 0)
    $.each(data.hits, function(i, hit){
      // console.log(hit.pageURL);
      document.getElementById('pictures_bot').innerHTML += '<img class="pictures" src="'+hit.largeImageURL+'">';
    });
    else
    // console.log('No hits');
    document.getElementById("pictures_bot").innerHTML = "<p>Leider gibt es zu diesem Suchbegriff keine Ergebnisse.<br/> Versuche es mit einem anderen Suchbegriff!</p>";
  });
}

function pictures_api_ideas() {
  var search_keyword = localStorage.getItem('current_keyword');
  if (search_keyword=="" || search_keyword=="undefined" ) {
    search_keyword = document.getElementById('keyword').value;
    document.getElementById('display_keyword').innerHTML=search_keyword+"<div class='tooltip'><i class='fas fa-info-circle' id='info'></i><span class='tooltiptext'>Diese Bilder basieren auf dem Begriff '"+search_keyword+"'.</span></div>";
  } else {
    document.getElementById('display_keyword').innerHTML=search_keyword+"<div class='tooltip'><i class='fas fa-info-circle' id='info'></i><span class='tooltiptext'>Diese Bilder basieren auf dem ersten Wort deiner letzten Idee.</span></div>";
  }

  // console.log(search_keyword);
  var API_KEY = '6744727-10a66348ecd65e24c927d55b6';

  var URL = "https://pixabay.com/api/?key="+API_KEY+"&q="+encodeURIComponent(search_keyword);
  $.getJSON(URL, function(data){
    document.getElementById('pictures_bot_ideas').innerHTML="";
    if (parseInt(data.totalHits) > 0) {
      $.each(data.hits, function(i, hit){
        // console.log(hit.pageURL);
        document.getElementById('pictures_bot_ideas').innerHTML += '<img class="pictures" src="'+hit.largeImageURL+'">';
      });
    } else {
      // console.log('No hits');
      document.getElementById("pictures_bot_ideas").innerHTML = "<p>Leider gibt es zu diesem Suchbegriff keine Ergebnisse.<br/> Vielleicht ergibt deine nächste Idee mehr Bilder!</p>";
    }
  });
}

function save_keyword() {
  var keyword = document.getElementById("idea").value;
  localStorage.setItem('current_keyword', keyword);
}

function save_keyword_edit(id) {
  // console.log("edit");
  // console.log(id);
  var keyword = document.getElementById(id).value;
  localStorage.setItem('current_keyword', keyword);

}

function playSound(){
  audio.play();
}

function onEnterIdea() {
  var input = document.getElementById("idea");
  if (input != null) {
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("send-button").click();
      }
    });
  }
}

function onEnterPicture() {
  var input = document.getElementById("search_pic");
  if (input != null) {
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("trigger_button").click();
      }
    });
  }
}

/* Association */



function search_api() {
  var association_keyword = localStorage.getItem('association_keyword');
  if (association_keyword=="" || association_keyword=="undefined" || association_keyword==null ) {
    localStorage.setItem('association_keyword', document.getElementById('keyword').value);
  }
  association_keyword = localStorage.getItem('association_keyword');



  const Http = new XMLHttpRequest();
  var API_KEY = '907bc27a-745a-4745-aafe-7c87d92e3618';
  const url='https://api.wordassociations.net/associations/v1.0/json/search?apikey='+API_KEY+'&text='+association_keyword+'&lang=de&limit=8';
  Http.open("GET", url);
  Http.send();
  var nodes = [];


  Http.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Typical action to be performed when the document is ready:
      //console.log(Http.responseText);
      var r=JSON.parse(Http.responseText);
      r.response[0]['items'].forEach((element, count) => {
        nodes[count] = element.item;
        //console.log(element.item);
      });

      //console.log(nodes);
      localStorage.setItem("nodes", JSON.stringify(nodes));
      //console.log(localStorage.getItem("nodes"));
      load_associations();
    }
  };


}

function load_associations_from_localstorage() {
  var storedNodes = JSON.parse(localStorage.getItem("nodes"));
}

// function reloadPage(association_keyword) {
//   localStorage.setItem('association_keyword', association_keyword);
//   load_associations();
// }

function clearCache() {
  localStorage.removeItem('breadcrumbs');
  localStorage.removeItem('association_keyword');
  localStorage.removeItem('counter');
  localStorage.removeItem('pic_manual_search');
  localStorage.removeItem('current_keyword');
  localStorage.removeItem('nodes');
  localStorage.removeItem('chat');
  localStorage.removeItem('first_load');
  localStorage.removeItem('superman');
  localStorage.removeItem('counterwhy');
  localStorage.removeItem('why');
  localStorage.removeItem('buttons');
  localStorage.removeItem("text_chat");
  localStorage.setItem("popup",0);

  var position_count = parseInt(localStorage.getItem('position'));
  localStorage.setItem('position',position_count+1);

  location.reload();
  let url = window.location.href;
  url=url.replace(/q=[^&]*/g,"q="+document.getElementById('keyword').value);
  window.location.href = url;
}

function zurücksetzen() {
  localStorage.removeItem('breadcrumbs');
  localStorage.removeItem('association_keyword');
  localStorage.removeItem('current_keyword');
  localStorage.removeItem('nodes');

  location.reload();
  let url = window.location.href;
  url=url.replace(/q=[^&]*/g,"q="+document.getElementById('keyword').value);
  window.location.href = url;
}

function set_keyword(){
  if (localStorage.getItem('association_keyword')==null){
    localStorage.setItem('association_keyword', document.getElementById('keyword').value);
  }
}

function breadcrumbs() {

  var previousBreadcrumbs = JSON.parse(localStorage.getItem("breadcrumbs"));
  association_keyword = localStorage.getItem('association_keyword');

  if(previousBreadcrumbs==null){
    // init with current keyword, duplication protection will ensure no doubles
    previousBreadcrumbs={breadcrumbs:[association_keyword]};
  }

  document.getElementById("association").value=association_keyword;


  //a.locale(b) = 0 if strings match
  //if last breadcrumb != current keyword
  if(0!=previousBreadcrumbs.breadcrumbs[previousBreadcrumbs.breadcrumbs.length-1].localeCompare(association_keyword)){
    //push keyword
    previousBreadcrumbs.breadcrumbs.push(association_keyword);
  }

  localStorage.setItem("breadcrumbs", JSON.stringify(previousBreadcrumbs));

  var displayBreadcrumbs=previousBreadcrumbs;

  var breadcrumbtrail=
  '<nav class="breadcrumb is-small has-arrow-separator" aria-label="breadcrumbs" >'+
  '<ul id="breadcrumb-list">';

  for (const crumb in previousBreadcrumbs.breadcrumbs){
    breadcrumbtrail+='<li><a onclick="click_breadcrumbs('+crumb+');">'+previousBreadcrumbs.breadcrumbs[crumb]+'</a></li>';
  }
  // console.log("trail "+breadcrumbtrail);

  breadcrumbtrail+='</ul></nav>';
  document.getElementById('breadcrumbs').innerHTML = breadcrumbtrail;

}

function click_breadcrumbs(id_bread) {
  var keyword_trail=JSON.parse(localStorage.getItem("breadcrumbs"));
  // console.log("id: "+id_bread);



  for(i=keyword_trail.breadcrumbs.length;i>id_bread+1;i--) {
    keyword_trail.breadcrumbs.pop();
  }

  // console.log(keyword_trail);
  localStorage.setItem("breadcrumbs", JSON.stringify(keyword_trail));
  localStorage.setItem('association_keyword',keyword_trail.breadcrumbs[id_bread]);
  breadcrumbs();

  var url = window.location.href;
  var url_short= url.replace(/q=[^&]*/g,"q="+keyword_trail.breadcrumbs[id_bread]);
  window.location.href = url_short;
}


function search_edit() {
  var edit_keyword_list =document.getElementsByClassName("association_edit");
  for (i=0;i<edit_keyword_list.length;i++){
    var edit_keyword = edit_keyword_list[i];
    edit_keyword.value=association_keyword;
  }
}

// chatbot

function chat_buttons(two_buttons=true) {
  var button=document.createElement("div");
  button.className="button_chat";

  var button1=chat_button_abbrechen();

  if(two_buttons){
    var button2=document.createElement("button");
    button2.className="button is-info chatbot_button";
    button2.onclick=function(){addWhy()};
    button2.innerHTML="Ich komme mit einem konkreten Problem nicht weiter.";
    button.appendChild(button2);
  }else{
    button1.id="abbrechen";
  }
  button.appendChild(button1);

  return button;
}

function chat_button_abbrechen() {
  var button=document.createElement("button");
  button.className="button is-info superman chatbot_button";
  button.onclick=function(){addSuperhero()};
  button.innerHTML="Mir fällt nichts mehr ein.";

  return button;
}
// var chat_buttons= '<div class="button_chat">'+
// '<button class="button is-info superman chatbot_button" onclick="addSuperhero();">Mir fällt nichts mehr ein.</button>'+
// '<button class=" button is-info chatbot_button" onclick="addWhy();">Ich komme mit einem konkreten Problem nicht weiter.</button>'+
// '</div>';

var chat_buttons_abbrechen= '<div class="button_chat">'+
'<button class="button is-info superman chatbot_button" id="abbrechen" onclick="addSuperhero();">Mir fällt nichts mehr ein.</button>'+
'</div>';

var chat ='<div class="message level">'+
'<img src="../img/chatbot.png" class="chatbot_icon">'+
'<p class="message_chatbot">Hallo! Ich bin da, um dir zu helfen, wenn du nicht weiterkommst. Sag einfach Bescheid, wie ich dir helfen kann!</p>'+
'</div>';

function updateScroll(){
  $(".assistant_chat").animate({ scrollTop: $(".assistant_chat")[0].scrollHeight}, 1);
  // console.log("scroll!");
}
// localStorage.removeItem('chat');
// localStorage.removeItem('first_load');
//  localStorage.removeItem('superman');
//   localStorage.removeItem('counter');
//   localStorage.removeItem('why');
// localStorage.removeItem('buttons');

function addChat() {
  if (localStorage.getItem("first_load")===null){
    localStorage.setItem("chat",chat);
    localStorage.setItem("buttons",true);
    localStorage.setItem("first_load",false);
  }


  document.getElementById('welcome').innerHTML =  localStorage.getItem("chat");

  if (localStorage.getItem("superman")===null){
    document.getElementById('message_space_inner').innerHTML ="";
  } else {
    document.getElementById('message_space_inner').innerHTML = localStorage.getItem("superman");
  }

  if (localStorage.getItem("buttons")){
    document.getElementById('message_space_inner').appendChild(chat_buttons());
  } else if (localStorage.getItem("text_chat")===null) {
  } else {
    document.getElementById('message_space_inner').appendChild(chat_buttons(false));
  }

  if (localStorage.getItem("text_chat")===null) {
    document.getElementById('chat-message').innerHTML ="";
  }else{
    document.getElementById('chat-message').innerHTML =localStorage.getItem("text_chat");
  }
  // $(".assistant_chat").animate({ scrollTop: $(".assistant_chat")[0].scrollHeight}, 0);
  updateScroll();
}

function addSuperhero() {
  var counter = parseInt(localStorage.getItem('counter'));
  // console.log('counter read: '+counter);

  if (Number.isNaN(counter)){
    counter=0;
  }

  document.getElementById('chat-message').innerHTML ="";
  localStorage.setItem("first_load", true);
  localStorage.setItem('buttons',true);


  let presup=
      '<div class="chatbot_superman">'+
      '<div class="message level">'+
      '<img src="../img/chatbot.png" class="chatbot_icon">'+
      '<p class="message_chatbot">';
  let postsup='</p>'+'</div>'+'</div>';
  //Superman Methode

  let new_msg='';
  switch(counter){
    case 0:
      new_msg="Okay. Manchmal hilft es eine andere Perspektive zu entwickeln. Wie würde zum Beispiel ein Superheld dieses Problem lösen?";
      break;
    case 1:
      new_msg='Okay. Es könnte helfen, die Problemstellung anders zu betrachten. Lässt sich positiv und negativ vertauschen? Ist eine Verkehrung in das Gegenteil möglich?';
      break;
    case 2:
      new_msg=
      "Okay. Um auf neue Ideen zu kommen, können Konzepte aus problemfremden Bereichen herangezogen werden."+
      ' Denke zum Beispiel an einen Begriff wie "Vogel".'+
      ' Untersuche diesen Begriff bezüglich seiner Merkmale, Prinzipien, Strukturen und Gestaltausprägungen.'+
      ' Versuche anschließend Bezüge zwischen den gefundenen Eigenschaften und dem konkreten Problem zu finden.';
      break;
    case 3:
      new_msg=
        "Okay. Vielleicht hast du den Grundstein deiner nächsten großen Idee bereits gelegt."+
        "Lassen sich deine bereits gesammelten Ideen oder Konzepte kombinieren?";
      break;
    case 4:
      new_msg=
        "Okay. Bist du eher ein Optimist oder Pessimist? Versuche dich in die jeweils andere Denkweise hineinzuversetzen. "+
        "Wenn du eher optimistisch bist, versuche pessimistischer zu denken und anders herum.";
      break;
    default:
      new_msg='Unerwarteter Fall. Wenden Sie sich bitte an die Versuchsleiterin!';
      break;
  }
  new_msg=presup+new_msg+postsup;

  if (localStorage.getItem("superman")===null){
    localStorage.setItem("superman", new_msg)
  } else {
    var superman_before = localStorage.getItem("superman");
    localStorage.setItem("superman", superman_before + new_msg);
  }
  counter=(counter+1)%5;
  localStorage.setItem("counter", counter);
  // console.log('counter: '+counter);

  addChat();
}

function addWhy() {

  //Message bot
  var why =
  '<div class="message level">'+
  '<img src="../img/chatbot.png" class="chatbot_icon">'+
  '<p class="message_chatbot">Okay. Versuche bitte, das Problem kurz in deinen eigenen Worten zusammenzufassen. Zum Beispiel: "Es ist schwer Leute für das Thema zu begeistern". Benutze dafür das Eingabefeld unten.</p>'+
  '</div>';

  if (localStorage.getItem("superman")===null){
    localStorage.setItem("superman", why)
  } else {
    var superman_before = localStorage.getItem("superman");
    localStorage.setItem("superman", superman_before + why);
  }

  //Message user
  var text_chat=
  '<input name="message-to-send" id="message-to-send" placeholder="Nachricht" rows="1">'+
  '<button class="button is-info"  id="send_message_why" onclick="writeMessage();"><i class="fas fa-paper-plane" id="send"></i></button>';
  localStorage.setItem("text_chat", text_chat);

  localStorage.setItem("counterwhy", 1);
  localStorage.removeItem("buttons");
  addChat();
}

function writeMessage() {

  var content = document.getElementById("message-to-send").value;
  // console.log(content);

  var counterwhy = parseInt(localStorage.getItem('counterwhy'));
  if (Number.isNaN(counterwhy)){
    counterwhy=0;
  }

  var why=
  '<div class="message level">'+
  '<p class="message_chatbot answer">'+content+'</p>'+
  '</div>'+
  '<div class="message level">'+
  '<img src="../img/chatbot.png" class="chatbot_icon">'+
  '<p class="message_chatbot">';

  if(counterwhy<=5){
    why+='Wieso?';
    localStorage.removeItem("buttons");
    // localStorage.setItem("button_abbrechen", true);
  } else if (counterwhy==6){
    why+='Okay! Ich hoffe, das konnte dir weiterhelfen. Wenn nicht, probiere eine weitere Technik!';
    // localStorage.setItem("button_abbrechen", false);
    localStorage.setItem("buttons", true);
    localStorage.setItem("text_chat", "");
  }
  why+='</p>'+'</div>';

  document.getElementById('message-to-send').value ="";

  var superman_before = localStorage.getItem("superman");
  localStorage.setItem("superman", superman_before + why);
  addChat();

  counterwhy=(counterwhy+1)%7;
  localStorage.setItem("counterwhy", counterwhy);
  // $(".assistant_chat").animate({ scrollTop: $(".assistant_chat")[0].scrollHeight}, 50);
}

function onEnterWhy() {
  var input = document.getElementById("chat-message");
  // console.log(input);
  if (input != null) {
    input.addEventListener("keyup", function(event) {
      if (event.keyCode === 13) {
        event.preventDefault();
        document.getElementById("send_message_why").click();
      }
    });
  }
}
