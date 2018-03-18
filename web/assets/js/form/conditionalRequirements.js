/**
 * Module to un/mark form inputs as required depending on other input's values
 *
 * @type {{init, toggleAsterisk}}
 */
let conditionalRequirements = (() => {

    /**
     * if required, appends to, else removes an asterisk from the passed string,
     * thus un/marking a required field
     *
     * @param string String
     * @param required Boolean
     */
    let toggleAsterisk = (string, required) => {
        return required ?
            string + ' *'
            :
            string.replace(/\s\*$/, '');
    };

    /**
     * listener to un/set the required attribute on one node if another's value is not empty
     * will not change anything if no change to required status is detected
     *
     * @param event
     */
    let toggleRequiredListener = event => {
        let targetInput = document.getElementById(event.target.dataset.constitutesRequirement);
        let required = '' !== event.target.value;

        if(null === targetInput || required === targetInput.required) {
            return;
        }

        targetInput.required = required;
        targetInput.placeholder = toggleAsterisk(targetInput.placeholder, targetInput.required);
    };

    /**
     * binds toggleRequiredListener to all nodes that have the data-constitutes-requirement attribute
     */
    let init = () => qsa('[data-constitutes-requirement]').forEach(
        element => element.on('input', toggleRequiredListener)
    );

    return {
        init: init,
        toggleAsterisk: toggleAsterisk
    };
})();

document.addEventListener('DOMContentLoaded', conditionalRequirements.init);