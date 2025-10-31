

(function () {
  const images = Array.from({ length: 10 }, (_, i) => `img/b${i + 1}.jpg`);

  const imgEl = document.getElementById("slide");
  const btnPlay = document.getElementById("btnPlay");
  const btnStop = document.getElementById("btnStop");

  let index = 0; 
  let timerId = null; 
  const delay = 1500
  function render() {

    imgEl.src = images[index];
  }

  function step() {
    
    index = (index + 1) % images.length;
    render();
    timerId = setTimeout(step, delay);
  }

  function play() {
    if (timerId !== null) return; 
    timerId = setTimeout(step, delay);
    btnPlay.disabled = true;
    btnStop.disabled = false;
  }

  function stop() {
    if (timerId === null) return; 
    clearTimeout(timerId);
    timerId = null;
    btnPlay.disabled = false;
    btnStop.disabled = true;
  }


  btnPlay.addEventListener("click", play);
  btnStop.addEventListener("click", stop);

  
  index = 0;
  render(); 
  btnStop.disabled = true; 
})();
