const Recruitment = () => {
    let oferty = [];
    const positionSelect = document.querySelector("#select");
    const description = document.querySelector("#description");
    const requirements = document.querySelector("#requirements");
    const benefits = document.querySelector("#benefits");
    const formInputId = document.querySelector("#selectedOfferId");

    let loaded = false
    let error = false
    let selectedOfferId = 0;

    var getUrl = window.location;
    var baseUrl = getUrl.protocol + "//" + getUrl.host

    fetch(baseUrl + '/templates_sql/api.php')
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

    if (positionSelect) {
        positionSelect.addEventListener('change', (event) => {
            if (loaded && !error) {
                selectedOfferId = event.target.value
                fillOffer(selectedOfferId)
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
                        let span = document.createElement("span")
                        span.innerHTML = requirement
                        li.appendChild(img)
                        li.appendChild(span)
                        requirements.appendChild(li)
                    })
                }
                if (benefitsArray.length > 1){
                    benefitsArray.forEach(benefit => {
                        let li = document.createElement("li")
                        let img = document.createElement("img")
                        img.src = "../src/img/Arrow_left.svg"
                        let span = document.createElement("span")
                        span.innerHTML = benefit
                        li.appendChild(img)
                        li.appendChild(span)
                        benefits.appendChild(li)
                    })
                }
            }
        })
        console.log(formInputId.value)
    }
}

export default Recruitment;