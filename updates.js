(function(){
var evtSource = new EventSource("events.php");
evtSource.onmessage = function(e) {
  var newElement = document.createElement("li");
  var eventList = document.getElementById('list');

  var data = JSON.parse(e.data);
  newElement.innerHTML = data["entry"];

  //insert new element
  eventList.insertBefore(newElement, eventList.childNodes[0] || null);

  //remove elements greater than 10
  if (eventList.childNodes.length > 10) {
    eventList.removeChild(eventList.childNodes[10]);
  }

}
})();
