var currentNum = 0;

$(document).ready(function () {

    $("#betButtons .btn").click(function (e) {
        e.preventDefault();
        var betAmount = $('#betAmount').val();
        var color = $(this).attr('id');
        $("#win-alert").html('<div class="timer text-white text-center fs-4">Timer :<span id="countdowntimer"> 0</span></div>');
        $("#win-alert").attr("class", "card-panel-next");

        $.ajax({
            type: 'POST',
            url: '/roulette.php',
            data: { "betAmount": betAmount, "color": color, },
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == "1") {
                    $("#balanceNumber").html(jsonData.oldBalance);
                    $('.' + color + 'bet').append('<div class="row mt-2" id="bet"><div class="name text-white" style="float: left;">' + jsonData.username + '</div><div class="bet text-white" style="float: right;">' + betAmount + '</div></div>');
                    Timer(jsonData);
                }
                else {
                    alert(jsonData.error);
                }
            }
        });
    });
    $(".btn-free").click(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/free.php',
            data: {},
            success: function (response) {
                var jsonData = JSON.parse(response);
                if (jsonData.success == 1) {
                    $("#balanceNumber").html(jsonData.freeBalance);
                    alert('your balance is replenished')
                } else { alert('you already have enough coins') }

            }
        });
    });


})

function Timer(json) {
    $(".btn-bet").attr("disabled", "disabled");
    $(".btn-free").attr("disabled", "disabled");
    var timeleft = 3;
    var downloadTimer = setInterval(function () {
        timeleft--;
        document.getElementById("countdowntimer").textContent = timeleft;
        if (timeleft <= 0) {
            clearInterval(downloadTimer);
            roll(json.rand);
            setTimeout(() => {
                $("#balanceNumber").html(json.balance);
                $(".btn-bet").removeAttr("disabled");
                $(".btn-free").removeAttr("disabled");
                if (json.win) {
                    $("#win-alert").html('<div class="text-uppercase text-white text-center fs-4">You win</div>');
                    $("#win-alert").attr("class", "card-panel-next-green");
                } else {
                    $("#win-alert").html('<div class="text-uppercase text-white text-center fs-4">You lose</div>');
                    $("#win-alert").attr("class", "card-panel-next-red");
                }
            }, 3000);
        }

    }, 1000);
}

function roll(num) {

    var numWidth = 1125 / 15;

    var layout = [1, 14, 2, 13, 3, 12, 4, 0, 11, 5, 10, 6, 9, 7, 8];

    function getMoves() {
        let to = layout.indexOf(num);
        let at = layout.indexOf(currentNum);

        if (to > at) {
            return (to - at);
        } else {
            return (layout.length - at + to);
        }
    }

    var currentPos = parseInt($('.case').css("background-position").split(" ")[0].slice(0, -2));
    currentPos ? null : currentPos = 0;
    $('.case').animate({
        "background-position": currentPos - 2250 - (getMoves() * numWidth),
    }, 3500, "swing");
    currentNum = num;
    setTimeout(function () {
        if ($("#past .ball").length >= 10) {
            $("#past .ball").first().remove();
        }
        if (num == 0) {
            $(".ball").last().after("<div class='ball ball-0'>" + num + "</div>");
        } else if (num <= 7) {
            ;
            $(".ball").last().after("<div class='ball ball-1'>" + num + "</div>");
        } else {
            $(".ball").last().after("<div class='ball ball-8'>" + num + "</div>");
        }
    }, 3300);
}
