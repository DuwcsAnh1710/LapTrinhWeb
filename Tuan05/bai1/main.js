(function () {
  const fields = {
    id: document.querySelector('[data-field="id"]'),
    name: document.querySelector('[data-field="name"]'),
    className: document.querySelector('[data-field="class"]'),
  };
  const tableNote = document.querySelector(".table-note");
  const btnPrompt = document.getElementById("btnPrompt");

  const emptyState = {
    id: "---",
    name: "---",
    className: "---",
  };

  let hasStudentData = false;

  function render(student) {
    const data = {
      id: student.id || emptyState.id,
      name: student.name || emptyState.name,
      className: student.className || emptyState.className,
    };

    fields.id.textContent = data.id;
    fields.name.textContent = data.name;
    fields.className.textContent = data.className;
  }

  function ask(question) {
    const response = window.prompt(question, "");
    if (response === null) {
      return null;
    }
    return response.trim();
  }

  function collectStudent() {
    const id = ask("Nhap ma so sinh vien (MSSV):");
    if (id === null) return null;

    const name = ask("Nhap ho ten sinh vien:");
    if (name === null) return null;

    const className = ask("Nhap lop:");
    if (className === null) return null;

    return { id, name, className };
  }

  function handlePrompt() {
    const student = collectStudent();

    if (!student) {
      tableNote.textContent = hasStudentData
        ? "Ban da huy loi nhac. Du lieu truoc do duoc giu nguyen."
        : "Ban da huy loi nhac nen chua co du lieu de hien thi.";
      if (!hasStudentData) {
        render(emptyState);
      }
      return;
    }

    hasStudentData = true;
    render(student);
    tableNote.textContent = "Thong tin sinh vien da duoc cap nhat tu loi nhac.";
  }

  // Cho phep nguoi dung nhap lai du lieu bat ky luc nao.
  btnPrompt.addEventListener("click", handlePrompt);

  // Thuc thi loi nhac ngay khi trang duoc tai theo yeu cau de bai.
  handlePrompt();
})();
