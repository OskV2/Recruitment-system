const Recruitment = () => {
    let oferty = [];
    const offerSelect = document.getElementById('recruitment__offer-select');
    const positionSelect = document.querySelector("#select");
    const description = document.querySelector("#description");
    const requirements = document.querySelector("#requirements");
    const benefits = document.querySelector("#benefits");
    const formInputId = document.querySelector("#selectedOfferId");
    const leftArrow = '<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.939341 10.9393C0.353554 11.5251 0.353554 12.4749 0.939341 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51472C13.1924 2.92893 13.1924 1.97919 12.6066 1.3934C12.0208 0.807611 11.0711 0.807611 10.4853 1.3934L0.939341 10.9393ZM25 10.5L2 10.5V13.5L25 13.5V10.5Z" fill="#1A8FDD"/></svg>'

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
                        let img = document.createElement("img")
                        img.src = "../src/img/Arrow_right.svg"
                        li.appendChild(img)
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
}

export default Recruitment;