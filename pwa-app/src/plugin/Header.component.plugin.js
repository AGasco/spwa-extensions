import ExtensionsButtonsComponent from 'Component/ExtensionsButtons';

import BreathingModeToggleButton from '../../packages/scandi-breathing-pattern/src/component/BreathingModeToggleButton';
import DarkModeToggleButton from '../../packages/scandi-dark-theme/src/component/DarkModeToggleButton';

// eslint-disable-next-line no-unused-vars
export const renderTopMenu = (args, callback, instance) => (
    <>
        { callback(...args) }
        <div block="Header" elem="BreathingModeToggle">
            <ExtensionsButtonsComponent>
                <BreathingModeToggleButton />
                <DarkModeToggleButton />
            </ExtensionsButtonsComponent>
        </div>
    </>
);

export default {
    'Component/Header/Component': {
        'member-function': {
            renderTopMenu
        }
    }
};
