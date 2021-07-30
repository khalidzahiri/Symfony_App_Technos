// https://api.github.com/users/

const APICALL = "https://api.github.com/users/";
const affichage = document.querySelector('.affichage');
const form = document.querySelector('.form-github-recherche');
const inpRecherche = document.querySelector('.inp-recherche');



async function dataGithub(utilisateur){

    const reponse = await fetch(`${APICALL}${utilisateur}`);
    const data = await reponse.json();
    console.log(inpRecherche);
    console.log(data);
    if (data.message !== 'Not Found') {
        creationCarte(data);
    }
}



dataGithub(inpRecherche.value);

function creationCarte(user){
    
    const carteHTML = `
    <img class="rounded-circle m-auto" height="100px" width="100px" src="${user.avatar_url}" alt="">
    `;
    affichage.innerHTML = carteHTML;
}


