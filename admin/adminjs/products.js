      // Clear default value when the textarea is focused
      function clearDefaultValue(element) {
        if (
            element.value === "Product Name:" ||
            element.value === "Product Price:" ||
            element.value === "Category:" ||
            element.value === "Stock:" ||
            element.value === "Size:" ||
            element.value === "Type:" ||
            element.value === "Skin Concern:" ||
            element.value === "Benefits:" ||
            element.value === "Main Ingredients:" ||
            element.value === "Ingredients:" ||
            element.value === "Describe your product.."
        ) {
            element.value = "";
        }
    }

    // Restore default value when the textarea loses focus
    function restoreDefaultValue(element) {
        if (element.value === "") {
            if (element.id === "productNameInput") {
                element.value = "Product Name:";
            } else if (element.id === "productPriceInput") {
                element.value = "Product Price:";
            } else if (element.id === "productDescInput") {
                element.value = "Describe your product..";
            }else if (element.id === "productCategoryInput") {
                element.value = "Category:";
            }else if (element.id === "productStockInput") {
                element.value = "Stock:";
            }else if (element.id === "productSizeInput") {
                element.value = "Size:";
            }else if (element.id === "productTypeInput") {
                element.value = "Type:";
            }else if (element.id === "productSkinInput") {
                element.value = "Skin Concern:";
            }else if (element.id === "productBenefitInput") {
                element.value = "Benefits:";
            }else if (element.id === "productMainingInput") {
                element.value = "Main Ingredients:";
            }else if (element.id === "productIngInput") {
                element.value = "Ingredients:";
            }
        }
    }