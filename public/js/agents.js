let content = document.querySelector('.content');

let newDataAgents = {
    "name": '',
    "bin": '',
    "adres": '',
    "bik": '',
    "contacts": ''
}
let agtName = document.getElementById('agtName')
agtName.onchange = () => {
    newDataAgents.name = agtName.value;
}
let agtBin = document.getElementById('agtBin')
agtBin.onchange = () => {
    newDataAgents.bin = agtBin.value;
}
let agtAdres = document.getElementById('agtAdres')
agtAdres.onchange = () => {
    newDataAgents.adres = agtAdres.value;
}
let agtBik = document.getElementById('agtBik')
agtBik.onchange = () => {
    newDataAgents.bik = agtBik.value;
}
let agtContacts = document.getElementById('agtContacts')
agtContacts.onchange = () => {
    newDataAgents.contacts = agtContacts.value;
}


document.getElementById('appendA').onclick = () => {
    newDataAgents = JSON.stringify(newDataAgents);
}

let actionAgents = document.getElementById('agents').addEventListener('click', () => {
content.innerHTML = ''+

'';
});