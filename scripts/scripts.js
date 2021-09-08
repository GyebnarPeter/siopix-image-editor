$('.nav-close-btn').click( () => $('.nav').hide() );
$('.nav-open-btn').click( () => $('.nav').show() );

function getCookie(cName) {
    const name = cName + "=";
    const cDecoded = decodeURIComponent(document.cookie); //to be careful
    const cArr = cDecoded.split('; ');
    let res;
    cArr.forEach(val => {
      if (val.indexOf(name) === 0) res = val.substring(name.length);
    })
    return res
}

let imageUrl = getCookie('image');

if(imageUrl) {
    let img = document.createElement('img');
    img.setAttribute('src', imageUrl);
    document.querySelector('main').appendChild(img);
}
