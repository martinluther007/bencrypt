const signupValues = {
  fullname: "",
  email: "",
  password: "",
  phoneNumber: "",
};

const signupErrors = {
  fullname: "",
  email: "",
  password: "",
  phoneNumber: "",
};

document.querySelector(".input-Box").addEventListener("blur", (e) => {
  console.log(e.target);
  alert("what a life");
});

document.querySelector(".input-Box").addEventListener("blur", (e) => {
  alert("it's all good");
});

document.getElementById("fname").addEventListener("blur", myFunction);

function myFunction() {
  alert("Input field lost focus.");
}

$(document).ready(() => {
  $(".inputBox").change(function (e) {
    signupValues[e.target.name] = e.target.value;
  });

  $(".inputBox").blur(function (e) {
    // e.preventDefault();
    alert("what a life");

    console.log(e);
    console.log(signupValues);

    console.log("GOING THROUGH CHANGES");
    const { name, value } = e.target;
    let values = {};
    values[name] = value;
    console.log(values);
    defineErrors(values, signupErrors);
    $(".inputBox").closest(".error").text(signupErrors.value);
  });
});

const defineErrors = (values, errors) => {
  const { name, value } = values;
  switch (name) {
    case "email":
      if (!value) return (errors.email = "Email cannot be empty!");
      console.log("hope");
      const status = validateEmail(value);
      if (status) return;
      return (errors.email = "Invalid email, Please use a correct value");
    case "fullname":
      if (!value) return (errors.fullname = "Full name cannot be empty!");
      if (!value.match(/^[A-Za-z]+$/))
        return (errors.fullname = "Name can only contain letters");
    case "password":
      if (!value) return (errors.password = "Password cannot be empty!");
      if (value.length < 8)
        return (errors.password =
          "Password must not be less than 8 characters");
    case "phone":
      if (!value) return (errors.phoneNumber = "Phone number cannot be empty!");
      if (/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[s\./0-9]*$/g.test(phone))
        return (errors.phoneNumber =
          "Invalid Phone Number, Please use a correct value");
      break;
  }
};

const validateEmail = (email) => {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  );
};
