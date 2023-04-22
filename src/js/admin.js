const Admin = () => {
    document.getElementById("id_of_textbox")
        .addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.key === 'Enter') {
            document.getElementById("id_of_button").click();
        }
    });
    
    document.getElementById("pw")
        .addEventListener("keyup", function(event) {
        event.preventDefault();
        if (event.key === 'Enter') {
            document.getElementById("myButton").click();
        }
    });
    
    function buttonCode()
    {
        document.getElementById("private").style.display = "none";
    }
}

export default Admin;