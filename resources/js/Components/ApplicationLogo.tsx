import {FC, SVGAttributes} from 'react';

const ApplicationLogo: FC<{className?: string}> = ({className = ''}) => {
    return (
        <img alt={'logo'} className={className} src={'/img/logo.png'} />
    );
}

export default ApplicationLogo