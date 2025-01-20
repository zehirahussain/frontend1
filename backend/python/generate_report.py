from fpdf import FPDF
import os
from datetime import datetime

class PDF(FPDF):
    def header(self):
        if self.page_no() == 1:
            self.set_font('Helvetica', 'B', 20)
            self.cell(0, 10, 'Monthly Report', new_x='LMARGIN', new_y='TOP', align='C')
            self.ln(150)  # Move to the next line
            current_date = datetime.now().strftime('%B %d, %Y')  # Get current date
            self.set_font('Helvetica', '', 12)
            self.cell(0, 10, current_date, new_x='LMARGIN', new_y='TOP', align='C')  # Display the date
            self.ln(100)
            self.set_font('Helvetica', '', 15)
            self.cell(0, 10, 'Generated by SAS Segmify', new_x='LMARGIN', new_y='TOP', align='C')
        

    def footer(self):
        self.set_y(-15)
        self.set_font('Helvetica', 'I', 8)  # Updated to Helvetica
        self.cell(0, 10, f'Page {self.page_no()}', new_x='RIGHT', new_y='TOP', align='C')  # Updated parameters

def generate_pdf(filename):
    pdf = PDF()
    pdf.add_page()
    pdf.set_font("Helvetica", size=14)  # Updated to Helvetica
    
    # Directory containing images
    images_dir = '../../public/static/images'
    
    # List all image files
    # List all valid image files
    valid_extensions = ('.jpg', '.jpeg', '.png', '.gif', '.bmp')
    images = [f for f in os.listdir(images_dir) if f.lower().endswith(valid_extensions) and os.path.isfile(os.path.join(images_dir, f))]
 
    
    for image in images:
        # Add each image to the PDF
        image_path = os.path.join(images_dir, image)
        pdf.add_page()
        pdf.image(image_path, x=10, y=10, w=180)  # Adjust x, y, w as needed
    
    # Save the PDF to the static/reports directory
    output_path = os.path.join("static", "reports", filename)
    pdf.output(output_path)
    return output_path

# Generate the PDF
generate_pdf("../../public/static/reports/monthly_report.pdf")

# Get the current script's directory
script_dir = os.path.dirname(os.path.abspath(__file__))

# Define the output directory dynamically
output_dir = os.path.join(script_dir, 'static', 'reports')

# Create the directory if it doesn't exist
if not os.path.exists(output_dir):
    os.makedirs(output_dir)

# Define the path for the PDF
plot_path = os.path.join(output_dir, '../../public/static/reports/monthly_report.pdf')


print(f'monthly report saved to {plot_path}')