function changeTimeZone(newdate, timeZone) {
    if (typeof newdate === 'string') {
      return new Date(
        new Date(newdate).toLocaleString('en-US', {
          timeZone,
        }),
      );
    }
  
    return new Date(
      newdate.toLocaleString('en-US', {
        timeZone,
      }),
    );
  }

setInterval(() => {
    d = new Date(); //object of date()
    d_cin = changeTimeZone(d,'Europe/Rome');
    d_nyc = changeTimeZone(d,'America/New_York');
    d_ldn = changeTimeZone(d,'Europe/London');
    d_mum = changeTimeZone(d,'Asia/Kolkata');
    d_tok = changeTimeZone(d,'Asia/Tokyo'); 
    hr = d_cin.getHours();
    hr_nyc = d_nyc.getHours();
    hr_ldn = d_ldn.getHours();
    hr_mum = d_mum.getHours();
    hr_tok = d_tok.getHours();
    min = d.getMinutes();
    min_mum = d_mum.getMinutes();
    sec_mum = d_mum.getSeconds();
    sec = d.getSeconds();
    hr_rotation = 30 * hr + min / 2; //converting current time
    hr_rotation_nyc = 30 * hr_nyc + min / 2; //converting current time
    hr_rotation_ldn = 30 * hr_ldn + min / 2; //converting current time
    hr_rotation_mum = 30 * hr_mum + min / 2; //converting current time
    hr_rotation_tok = 30 * hr_tok + min / 2; //converting current time
    min_rotation = 6 * min;
    sec_rotation = 6 * sec;
    min_rotation_mum = 6 * min_mum;
    sec_rotation_mum = 6 * sec_mum;
  
    hour.style.transform = `rotate(${hr_rotation}deg)`;
    hour_nyc.style.transform = `rotate(${hr_rotation_nyc}deg)`;
    hour_ldn.style.transform = `rotate(${hr_rotation_ldn}deg)`;
    hour_mum.style.transform = `rotate(${hr_rotation_mum}deg)`;
    hour_tok.style.transform = `rotate(${hr_rotation_tok}deg)`;
    minute.style.transform = `rotate(${min_rotation}deg)`;
    minute_nyc.style.transform = `rotate(${min_rotation}deg)`;
    minute_ldn.style.transform = `rotate(${min_rotation}deg)`;
    minute_mum.style.transform = `rotate(${min_rotation_mum}deg)`;
    minute_tok.style.transform = `rotate(${min_rotation}deg)`;
    second.style.transform = `rotate(${sec_rotation}deg)`;
    second_nyc.style.transform = `rotate(${sec_rotation}deg)`;
    second_ldn.style.transform = `rotate(${sec_rotation}deg)`;
    second_mum.style.transform = `rotate(${sec_rotation_mum}deg)`;
    second_tok.style.transform = `rotate(${sec_rotation}deg)`;
}, 1000);