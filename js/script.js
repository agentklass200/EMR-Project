

$(document).ready(function(){

    var status, currentStatus = 0;

    setInterval(function(){
        $.ajax({
            url: "get_percent",
            success: function(data){
                var percent = data.percent;
                if(percent >= 70 && percent < 100){
                    if (percent >= 70 && percent < 80){
                        status = 1;
                    }
                    else if(percent >= 80 && percent < 90){
                        status = 2;
                    }
                    else if(percent >= 90 && percent < 100){
                        status = 3;
                    }

                    if(currentStatus != status){
                        currentStatus = status;
                        $(".r").empty();
                        checkAlert(data);
                    }   
                }
                else if(percent >= 100){
                    status = 4;
                    if(currentStatus != status){
                        currentStatus = status;
                        $(".r").empty();
                        danger();
                    }
                }
                else{
                    status = 0;
                    currentStatus = 0;
                    $(".r").empty();
                }
            }
        });
    }, 1000);




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