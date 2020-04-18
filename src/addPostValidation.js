
function FormValidation(e){
    
        
        var title = document.getElementById("titleInput").value;
        var textArea = document.getElementById("textArea").value;
        if(title =="" && textArea != "")
        {
            document.getElementById('titleInput').style.borderColor = "red";
            document.getElementById('textArea').style.borderColor = " #609FB4";
            return false;
        }
        else if(textArea == "" && title != "")
        {
            document.getElementById('textArea').style.borderColor = "red";
            document.getElementById('titleInput').style.borderColor = "#609FB4";
            return false;
        }
        else if(title == ""   && textArea == "")
        {
            
            document.getElementById('titleInput').style.borderColor = "red";
            document.getElementById('textArea').style.borderColor = "red";
            return false;
        }
        
        
       
    }