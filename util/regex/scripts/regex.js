let regex;
let text;
let idx = 0;

function getRegex() {
    let regTxt = $('#regex').val();
    
    if(regTxt.length < 1) {
        regex = null;
        return;
    }

    try {
        regex = new RegExp(regTxt, 'g');
    } catch(e) {
        regex = null;
        return;
    }
}

function getText() {
    return text = $('#text').val();
}

function setTextFromUrl(url) {
    $.ajax({url: url, success: setText});
}

function setText(t) {
    $('#text').val(t.substring(0, 2048));
    getText();
	executeRegex();
}

function clearResult() {
    $('tr.result').remove();
    idx = 0;
}

function appendResult(txt) {
    let row = $('<tr class="result"></tr>');

    let idElem = $(`<td>${idx}</td>`);
    row.append(idElem);

    let txtElem = $(`<td>"${txt}"</td>`);
    row.append(txtElem);

    $('#result').append(row);

    idx += 1;
}

function executeRegex() {
    getText();
    getRegex();
    clearResult();

    if(regex === null) {
        $('#regex').addClass('error');
        return;
    }

    $('#regex').removeClass('error');

    let res = text.match(regex);
    for(let r in res)
        appendResult(res[r]);

    
}