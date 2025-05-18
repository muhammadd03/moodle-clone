document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    const helpTypeSelect = document.getElementById('helpType');
    const getStartedContent = document.getElementById('getStartedContent');
    const supportContent = document.getElementById('supportContent');
    const differentEnquiryContent = document.getElementById('differentEnquiryContent');
    const productTypeSelect = document.getElementById('productType');
    const moodleCloudInfo = document.getElementById('moodleCloudInfo');
    const moodleLmsInfo = document.getElementById('moodleLmsInfo');
    const moodleWorkplaceInfo = document.getElementById('moodleWorkplaceInfo');
    const userAdminInfo = document.getElementById('userAdminInfo');
    const userTypeSelect = document.getElementById('userType');
    const partnerInfo = document.getElementById('partnerInfo');
    const meqInfo = document.getElementById('meqInfo');
    const moodleAppInfo = document.getElementById('moodleAppInfo');
    const moodleMootsInfo = document.getElementById('moodleMootsInfo');
    const communitySitesInfo = document.getElementById('communitySitesInfo');
    const differentSiteInfo = document.getElementById('differentSiteInfo');
    const communitySitesFormInfo = document.getElementById('communitySitesFormInfo');
    const academyInfo = document.getElementById('academyInfo');
    const fundMoodleInfo = document.getElementById('fundMoodleInfo');
    const trademarksInfo = document.getElementById('trademarksInfo');
    const privacyInfo = document.getElementById('privacyInfo');
    const prInfo = document.getElementById('prInfo');
    const securityInfo = document.getElementById('securityInfo');
    
    // Function to hide all content sections
    const hideAllSections = () => {
        const allSections = [
            getStartedContent,
            supportContent,
            differentEnquiryContent,
            moodleCloudInfo,
            moodleLmsInfo,
            moodleWorkplaceInfo,
            userAdminInfo,
            meqInfo,
            moodleAppInfo,
            partnerInfo,
            moodleMootsInfo,
            communitySitesInfo,
            differentSiteInfo,
            communitySitesFormInfo,
            academyInfo,
            fundMoodleInfo,
            trademarksInfo,
            privacyInfo,
            prInfo,
            securityInfo
        ];
        
        allSections.forEach(section => {
            if (section) {
                section.style.display = 'none';
            }
        });
    };

    helpTypeSelect.addEventListener('change', (e) => {
        const selectedValue = e.target.value;
        hideAllSections();
        
        if (selectedValue === 'get-started') {
            getStartedContent.style.display = 'block';
        } else if (selectedValue === 'support') {
            supportContent.style.display = 'block';
            productTypeSelect.value = '';
        } else if (selectedValue === 'other') {
            differentEnquiryContent.style.display = 'block';
        }
    });

    productTypeSelect.addEventListener('change', (e) => {
        const selectedValue = e.target.value;
        hideAllSections();
        supportContent.style.display = 'block';
        
        if (selectedValue === 'fund') {
            fundMoodleInfo.style.display = 'block';
        } else if (selectedValue === 'academy') {
            academyInfo.style.display = 'block';
        } else if (selectedValue === 'community') {
            communitySitesInfo.style.display = 'block';
        } else if (selectedValue === 'moodlecloud') {
            moodleCloudInfo.style.display = 'block';
        } else if (selectedValue === 'moodle-lms') {
            moodleLmsInfo.style.display = 'block';
        } else if (selectedValue === 'moodle-workplace') {
            moodleWorkplaceInfo.style.display = 'block';
            userTypeSelect.value = '';
        } else if (selectedValue === 'meq') {
            meqInfo.style.display = 'block';
        } else if (selectedValue === 'moodle-app') {
            moodleAppInfo.style.display = 'block';
        } else if (selectedValue === 'moodlemoots') {
            moodleMootsInfo.style.display = 'block';
        }
    });

    userTypeSelect.addEventListener('change', (e) => {
        const selectedValue = e.target.value;
        hideAllSections();
        supportContent.style.display = 'block';
        moodleWorkplaceInfo.style.display = 'block';
        
        if (selectedValue === 'user') {
            userAdminInfo.style.display = 'block';
        } else if (selectedValue === 'partner') {
            partnerInfo.style.display = 'block';
        }
    });

    document.getElementById('communityIssueType').addEventListener('change', (e) => {
        const selectedValue = e.target.value;
        hideAllSections();
        supportContent.style.display = 'block';
        communitySitesInfo.style.display = 'block';
        
        if (selectedValue === 'moodle-sites' || selectedValue === 'registering') {
            communitySitesFormInfo.style.display = 'block';
        } else if (selectedValue === 'different') {
            differentSiteInfo.style.display = 'block';
        }
    });

    document.getElementById('enquiryType').addEventListener('change', (e) => {
        const selectedValue = e.target.value;
        hideAllSections();
        differentEnquiryContent.style.display = 'block';
        
        if (selectedValue === 'privacy') {
            privacyInfo.style.display = 'block';
        } else if (selectedValue === 'trademarks') {
            trademarksInfo.style.display = 'block';
        } else if (selectedValue === 'pr') {
            prInfo.style.display = 'block';
        } else if (selectedValue === 'security') {
            securityInfo.style.display = 'block';
        }
    });
});