// Initialize Quill.js
const quill = new Quill('#editor', {
    theme: 'snow',
});

// Add toolbar options
quill.getModule('toolbar').addHandler('bold', function () {
    quill.format('bold', true);
});
quill.getModule('toolbar').addHandler('italic', function () {
    quill.format('italic', true);
});
quill.getModule('toolbar').addHandler('underline', function () {
    quill.format('underline', true);
});
// Function to save the content
function saveContent() {
    const content = quill.root.innerHTML;
    // Send the content to the server or perform further processing
    console.log(content);
}

// Add an event listener to the editor for content change
quill.on('text-change', saveContent);
const Size = Quill.import('attributors/style/size');
        Size.whitelist = ['10px', '13px', '16px', '19px', '22px', '26px', '30px', '36px', '42px', '48px', '64px', '92px'];
        Quill.register(Size, true);

        const Font = Quill.import('formats/font');
        Font.whitelist = ['Arial', 'Calibri', 'Comic Sans MS', 'Verdana'];
        Quill.register(Font, true);

        const quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: '#toolbar',
                mention: {
                    allowedChars: /^[A-Za-z\sÅÄÖåäö]*$/,
                    mentionDenotationChars: ['@'],
                    source: function (searchTerm, renderList, mentionChar) {
                        const mentionList = [
                            { id: 1, value: 'John Doe' },
                            { id: 2, value: 'Jane Smith' },
                            { id: 3, value: 'David Johnson' },
                            { id: 4, value: 'Lisa Anderson' }
                        ];
                        const matches = [];
                        for (let i = 0; i < mentionList.length; i++) {
                            if (mentionList[i].value.toLowerCase().includes(searchTerm.toLowerCase())) {
                                matches.push(mentionList[i]);
                            }
                        }
                        renderList(matches);
                    },
                }
            }
        });

        function saveContent() {
            const content = quill.root.innerHTML;
            // Send the content to the server or perform further processing
            console.log(content);
        }

        quill.on('text-change', saveContent);

        function exportAsPDF() {
            const content = quill.root.innerHTML;
            const doc = new jsPDF();
            doc.fromHTML(content, 15, 15, {
                width: 170
            });
            doc.save("document.pdf");
        }

        function printContent() {
            const content = quill.root.innerHTML;
            const printWindow = window.open('', '', 'width=600,height=800');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>');
            printWindow.document.write(content);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
