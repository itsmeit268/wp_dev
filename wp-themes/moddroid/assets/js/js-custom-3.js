"serviceWorker"in navigator&&navigator.serviceWorker.register("/sw.js").then(e=>{console.log("Registered service worker")}).catch(e=>{console.log("Register service worker failed",e)});

function() {
  var t = e.dataset.target;
  document.getElementById(t).classList.toggle("collapse")
}