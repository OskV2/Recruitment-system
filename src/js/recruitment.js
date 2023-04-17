const Recruitment = () => {
    let oferty = [];
    const offerSelect = document.getElementById('recruitment__offer-select');
    const positionSelect = document.querySelector("#select");
    const description = document.querySelector("#description");
    const requirements = document.querySelector("#requirements");
    const benefits = document.querySelector("#benefits");
    const formInputId = document.querySelector("#selectedOfferId");
    //const jobInput = document.getElementById('job_input');
    let loaded = false
    let error = false
    let selectedOfferId = 0;

    fetch('http://localhost:3000/api.php')
    .then(response => response.json())
    .then(data => oferty = data)
    .then(() => { 
        console.log(oferty)
        console.log("pobrano oferty")
        loaded = true
        fillSelect()
        fillOffer(oferty[0].Job_Off_Id)
    })
    .catch((e) => { 
        console.error(e)
        error = true
    })

    // szukasz selecta (document.querySelector)
    // potem do tego selecta dodajesz options tyle ile jest firm w jsonie 
    // np. pobralo ci z bazy 5 firm to bedziesz mial 5 options w select'cie (foreach)

    // potem PO POBRANIU DANYCH do description i do benefitow dodajesz wartosci PIERWSZEJ firmy (bo taka jest wybrana w select'cie domyślnie)

    // potem jak zmieniasz firme to wyciagasz wartosci dla TEJ WYBRANEJ W SELECT'CIE firmy (event.target.value) wartosci
    // i podmieniasz description i benefity
    // ^^ od tego masz wlasnie addEventListener('change')

    //bo addEvenetListener nasluchuje zmian w selectcie
    
    // profit

    if (positionSelect) {
        positionSelect.addEventListener('change', (event) => {
            if (loaded && !error) {
                selectedOfferId = event.target.value // ustawiasz zmienna na id oferty
                fillOffer(selectedOfferId) // wypelniasz oferte wartosciami z ID tej oferty
            }
        })
    }

    const fillSelect = () => {
        oferty.forEach((oferta) => {
            let option = document.createElement("option")
            option.text = oferta.Job_Off_Name
            option.value = oferta.Job_Off_Id
            positionSelect.add(option)
        })
    }

    const fillOffer = (offerIdToFill) => {
        oferty.forEach((oferta) => {
            if (oferta.Job_Off_Id == offerIdToFill){
                description.innerHTML = oferta.Job_Off_Desc
                formInputId.value = oferta.Job_Off_Id
                let requirementsArray = oferta.Job_Off_Req.split(", ")
                let benefitsArray = oferta.Job_Off_Bene.split(", ")
        
                requirements.replaceChildren()
                benefits.replaceChildren()
        
                if (requirementsArray.length > 1) {
                    requirementsArray.forEach(requirement => {
                        let li = document.createElement("li")
                        li.innerHTML = requirement
                        requirements.appendChild(li)
                    })
                }
                if (benefitsArray.length > 1){
                    benefitsArray.forEach(benefit => {
                        let li = document.createElement("li")
                        li.innerHTML = benefit
                        benefits.appendChild(li)
                    })
                }
            }
        })
        console.log(formInputId.value)
    } 

    // const requirements = document.querySelector("#requirement");
    // //js foreach requirement
    // requirements.innerHTML = ``

    // const benefits = document.querySelector("#benefit");
    // //js foreach benefits
    // benefits.innerHTML = ``
}

export default Recruitment;


//   jobSelect.addEventListener('change', function() {
//     const selectedJob = jobSelect.value;
//     jobInput.value = selectedJob;
// });
