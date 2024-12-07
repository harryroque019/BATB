  // JavaScript to update content based on the selected question
const sectionSelect = document.getElementById('section');
const textContainer = document.getElementById('text');

const faqAnswers = {
    "What is Beauty and the Best?": `
    Welcome to Beauty and the Best, where our passion for skincare meets our commitment to quality and <br> transparency. We believe that everyone deserves to feel confident and  beautiful in their own skin, and we're here to help you achieve that.
    Founded in 2024, by a team of skincare enthusiasts, our journey began with a simple mission: to provide high-quality, effective products that are easy to understand and accessible to everyone. We know that navigating the world of beauty can 
    be overwhelming, with confusing labels and endless choices. That's why we prioritize clarity and honesty in everything we do, ensuring that you can make informed decisions about the products you choose.
    `,
    "How do I create an account?": `
    Step 1: Look for the “Sign Up” button and click it to be directed to the account creation page. <br>
    Step 2: Fill out the Registration Form. Enter the required information. This includes: <br>
    - Full Name
    - Email
    - Password
    - Phone Number<br>
    Step 3: Agree to Terms and Conditions<br>
    Step 4: Submit your Information <br>
    Step 5: Agree to Terms and Conditions: Check the box to agree to Terms of Use and Privacy Policy. <br>
    Step 6: Click the “Create Account” button to submit your information.<br>
    Step 7: Upon creating an account, there are some questions to answer for the “personalized recommendations” features that our platform offers. <br>
    Step 8: After creating an account and making sure that your account is verified you can now finally purchase the items you are looking for. <br>
    `,
    "Do I need to create an account to make a purchase?": `
    Yes, why? Creating an account makes shopping more convenient and faster. It also allows the system to store your information, which helps track customer preferences and purchasing habits, enabling personalized marketing and recommendations. Lastly, having an account provides access to your order history and an organized checkout process.

    `,
    "How do I find the right skincare products for my skin type?": `
    Choosing the right skincare products for your skin type can be hard and confusing, especially if you lack knowledge. To address this issue, our developers have created a solution to reduce the hassle that people often experience. We aim to provide comprehensive information about the products we offer to enhance and streamline the shopping experience.
    <br> <br> Our detailed product descriptions include key ingredients, benefits, and usage tips tailored to different skin types. Additionally, we provide expert advice and customer reviews to help you make informed decisions. By empowering you with the right information, we strive to make your skincare journey enjoyable and effective.

    `,
    "What payment methods do you accept?": `
    Unfortunately, we only accept PayPal as a payment method. Why? Since our system is newly developed, it has not yet undergone integration with various types of payment methods. Thank you for your understanding.

    `,
    "How can I contact customer support?": `
    You can easily contact and reach out to us by messaging us on our social media platform.
    `
};

// Update the content of the paragraph when the selection changes
sectionSelect.addEventListener('change', function() {
    const selectedOption = sectionSelect.value;

    // Check if a valid question is selected
    if (selectedOption !== 'none') {
        textContainer.innerHTML = `<h4>${selectedOption}</h4> ${faqAnswers[selectedOption] || ''}`;
    } else {
        textContainer.innerHTML = ''; // Clear content if no valid option is selected
    }
});