/**
 * Admin page script module
 */

/**
 * @param {Number} index 
 */
function selectTab(index)
{
    var selector = `tab-page-${index}`;
    var button = document.querySelector(`[data-target="${selector}"]`);
    var page = document.getElementById(`${selector}`);

    var pages = document.querySelectorAll('.tabs-pages__page');
    var buttons = document.querySelectorAll('.tabs__button');

    pages.forEach(page => { page.classList.remove('is-active'); })
    buttons.forEach(button => { button.classList.remove('is-active'); })

    page.classList.add('is-active');
    button.classList.add('is-active');
}

/**
 * @param {String} code
 * @return {void}
 */
function addRow(code)
{
    var id = `inputs-${code}`;
    var inputsContainer = document.getElementById(id);
    var totalKeys = inputsContainer.querySelectorAll('.key-input-js').length;
    var nextKeyIndex = totalKeys + 1;

    var html = inputsContainer.innerHTML;
    inputsContainer.innerHTML = `
        <input 
            type="text" 
            name="localization[${code}][new_key_${nextKeyIndex}][key]" 
            class="w-50p key-input-js" 
            value="new_key"
        >

        <input 
            type="text" 
            name="localization[${code}][new_key_${nextKeyIndex}][word]" 
            class="w-50p word-input-js" 
            value="Word"
        >
    `;
    inputsContainer.innerHTML += html;
}