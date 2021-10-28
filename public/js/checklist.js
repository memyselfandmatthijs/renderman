let $checkList = document.getElementById('list1');

window.addEventListener('load', init);

function init(){
    $checkList.getElementsByClassName('anchor')[0].addEventListener('click', clickHandler);
}

function clickHandler(){
    if ($checkList.classList.contains('visible'))
        $checkList.classList.remove('visible');
    else
        $checkList.classList.add('visible');
}

