function addPol(){
        var option = document.createElement("option");
        option.text = document.getElementById("inputPol").value;
        var select = document.getElementById("listPol");
        select.appendChild(option);
    }

    function delPol(){
        var select = document.getElementById("listPol");
        select.remove(select.selectedIndex);
    }