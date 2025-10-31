(function () {
  const outputSelector = (key) =>
    document.querySelector(`[data-output="${key}"]`);

  function showMessage(key, message, isSuccess = false) {
    const target = outputSelector(key);
    if (!target) return;
    target.textContent = message;
    target.classList.toggle("is-success", Boolean(isSuccess));
  }

  // a) Register and login forms
  (() => {
    const registerForm = document.getElementById("registerForm");
    const loginForm = document.getElementById("loginForm");

    if (registerForm) {
      registerForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const formData = new FormData(registerForm);
        const fullName = formData.get("fullName").trim();
        const password = formData.get("password");
        const maskedPwd = "*".repeat(Math.min(password.length, 12)) || "(empty)";
        showMessage(
          "register",
          `Dang ky thanh cong cho ${fullName}. Mat khau cua ban: ${maskedPwd}`,
          true
        );
        registerForm.reset();
      });
    }

    if (loginForm) {
      loginForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const formData = new FormData(loginForm);
        const username = formData.get("username").trim();
        showMessage(
          "login",
          `Xin chao ${username}, ban da dang nhap demo thanh cong.`,
          true
        );
        loginForm.reset();
      });
    }
  })();

  // b) Basic math operations
  (() => {
    const mathForm = document.getElementById("mathForm");
    if (!mathForm) return;

    const numberAInput = mathForm.querySelector('input[name="numberA"]');
    const numberBInput = mathForm.querySelector('input[name="numberB"]');
    const resultInput = mathForm.querySelector('input[name="result"]');

    function parseNumber(value) {
      if (typeof value !== "string") return NaN;
      const normalised = value.replace(",", ".").trim();
      if (normalised === "") return NaN;
      return Number(normalised);
    }

    function calculate(operator) {
      const a = parseNumber(numberAInput.value);
      const b = parseNumber(numberBInput.value);

      if (!Number.isFinite(a) || !Number.isFinite(b)) {
        showMessage("math", "Vui long nhap dung so thuc cho ca hai truong.");
        resultInput.value = "";
        return;
      }

      let result;
      switch (operator) {
        case "add":
          result = a + b;
          break;
        case "subtract":
          result = a - b;
          break;
        case "multiply":
          result = a * b;
          break;
        case "divide":
          if (b === 0) {
            showMessage("math", "Khong the chia cho 0.");
            resultInput.value = "";
            return;
          }
          result = a / b;
          break;
        case "mod":
          if (b === 0) {
            showMessage("math", "Khong the chia du cho 0.");
            resultInput.value = "";
            return;
          }
          result = a % b;
          break;
        default:
          return;
      }

      const display =
        Math.abs(result) < 1e-4 || Math.abs(result) > 1e6
          ? result.toExponential(4)
          : Number.isInteger(result)
          ? result.toString()
          : result.toFixed(4).replace(/\.?0+$/, "");

      resultInput.value = display;
      showMessage("math", `Da thuc hien phep ${operator.toUpperCase()}.`, true);
    }

    mathForm.querySelectorAll("button[data-operator]").forEach((button) => {
      button.addEventListener("click", () => {
        calculate(button.dataset.operator);
      });
    });
  })();

  // c) Coffee selection
  (() => {
    const coffeeForm = document.getElementById("coffeeForm");
    if (!coffeeForm) return;

    const updateSummary = () => {
      const selected = Array.from(
        coffeeForm.querySelectorAll('input[name="coffee"]:checked')
      ).map((input) => input.value);

      if (selected.length === 0) {
        showMessage(
          "coffee",
          "Ban chua chon loai cafe nao. Hay chon it nhat mot loai de thuong thuc."
        );
        return;
      }

      showMessage(
        "coffee",
        `Ban chon cafe: ${selected.join(", ")}.`,
        true
      );
    };

    coffeeForm.addEventListener("change", (event) => {
      if (event.target.matches('input[name="coffee"]')) {
        updateSummary();
      }
    });

    updateSummary();
  })();

  // d) Format form
  (() => {
    const formatForm = document.getElementById("formatForm");
    const applyBtn = document.getElementById("applyFormat");
    const resetBtn = document.getElementById("resetFormat");
    const preview = document.getElementById("formatPreview");
    if (!formatForm || !applyBtn || !resetBtn || !preview) return;

    const defaultStyles = {
      color: preview.style.color,
      backgroundColor: preview.style.backgroundColor,
    };

    function resetFormStyles() {
      preview.style.color = defaultStyles.color || "#1f2933";
      preview.style.backgroundColor = defaultStyles.backgroundColor || "#ffffff";
      formatForm.colorChoice.value = "";
      preview.focus();
      showMessage("format", "Da huy thay doi mau.");
    }

    applyBtn.addEventListener("click", () => {
      const formData = new FormData(formatForm);
      const name = formData.get("ownerName").trim();
      const applyType = formData.get("applyType");
      const colorChoice = formData.get("colorChoice");

      if (!colorChoice) {
        showMessage("format", "Vui long chon mau truoc khi doi mau.");
        return;
      }

      if (applyType === "background") {
        preview.style.backgroundColor = colorChoice;
      } else {
        preview.style.color = colorChoice;
      }

      const targetLabel = applyType === "background" ? "nen" : "chu";
      showMessage(
        "format",
        `${name || "Ban"} da doi mau ${targetLabel} thanh cong.`,
        true
      );
    });

    resetBtn.addEventListener("click", resetFormStyles);
  })();
})();
