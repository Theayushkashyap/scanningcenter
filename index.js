function updateTime() {
    const today = new Date();
    let hours = today.getHours();
    let minutes = today.getMinutes();
    let seconds = today.getSeconds();
    let ampm = hours >= 12 ? 'PM' : 'AM';
  
    // Convert to 12-hour format
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0' + minutes : minutes;
    seconds = seconds < 10 ? '0' + seconds : seconds;
  
    const timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
    const clock = document.querySelector('.clock');
    clock.setAttribute('data-time', timeString);
  }
  
function updateDate() {
  const now = new Date();
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  const dateString = now.toLocaleDateString('en-US', options);
  const dayOfWeek = now.toLocaleDateString('en-US', { weekday: 'long' });
  const dateStringFormatted = dayOfWeek + ', ' + dateString;
  const date = document.querySelector('.date');
  date.textContent = dateStringFormatted;
}

updateTime();
setInterval(updateTime, 1000);
updateDate();
setInterval(updateDate, 1000);

  
  updateTime();
  setInterval(updateTime, 1000);
  updateDate();
  setInterval(updateDate, 1000);
  