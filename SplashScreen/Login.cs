using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SplashScreen
{
    public partial class Login : Form
    {
        public Login()
        {
            InitializeComponent();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (userTextBox.Text == "danish" && passTextBox.Text == "1234567890")
            {
                this.Hide();
                Form menu = new Menu();
                menu.Show();
            }
            else if (userTextBox.Text == "zain" && passTextBox.Text == "0987654321")
            {
                this.Hide();
                Form menu = new Menu();
                menu.Show();
            }
            else
            {
                MessageBox.Show("INCORRECT NAME OR PASSWORD");
                userTextBox.Clear();
                passTextBox.Clear();
                userTextBox.Focus();
            }
        }

        private void pictureBox3_Click(object sender, EventArgs e)
        {

        }

        private void Login_Load(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }
    }
}
