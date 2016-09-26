

$(document).ready(function(){

    $.ajax({
            url: "get_percent",
            success: function(data){
                var percent = data.percent;
                if(percent >= 70 && percent < 100){
                    $(".r").empty();
                    checkAlert(data);
                }
                else if(percent >= 100){
                    $(".r").empty();
                    danger();
                }
                else{
                    $(".r").empty();
                }
            }
    });




});

function danger(){
    var elements = `
                    <div class="alert alert-danger" style="font-size: 16px; margin-top:20px;">
                        <strong>Warning! </strong><span>You have reach your recommended average daily consumption, try to lessen your usage in the following days to avoid exceeding your target kwh limit.</span>
                    </div>
                    `;
    $(".r").append(elements);
}


function checkAlert(data){
    $.ajax({
        url: $base_url + "js/appliances.json",
        datatype: "JSON",
        success: function(data){

            var message;

            $.ajax({
                url: "get_checked",
                datatype: "JSON",
                success: function(data2){
                    var randomAppliances = parseInt(data2[Math.floor(Math.random() * data2.length)]) - 1;
                    var randomMessage = Math.floor(Math.random() * data.appliances[randomAppliances].length);

                    message = data.appliances[randomAppliances][randomMessage];

                     var elements = `
                                    <div class="alert alert-warning" style="font-size: 16px; margin-top:20px;">
                                        <strong>Warning! </strong><span>` + message + `</span>
                                    </div>
                                    `;
                     $(".r").append(elements);
                }
            });

           
        }
    });
}

function S(name,value){
    this.name = name;
    if(typeof value !== "undefined"){
        this.value = value;
    }

    this.write = function(value){
        $("."  + this.name).empty();
        if(typeof value !== "undefined"){
            this.value = value;
        }
        $("."  + this.name).append(this.value);
    }

    this.createDOM = function(element){
        $(element).append("<span class='" + this.name + "'></span>");
    }
    
}