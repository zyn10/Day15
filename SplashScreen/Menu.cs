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
    public partial class Menu : Form
    {
        public Menu()
        {
            InitializeComponent();
        }

        private void med_Click(object sender, EventArgs e)
        {
            medicine button1 = new medicine();
            button1.ShowDialog();
        }

        private void off_Click(object sender, EventArgs e)
        {
            this.Hide();
            Form log = new Login();
            log.Show();
            this.Hide();
        }

        private void user_Click(object sender, EventArgs e)
        {
            customer button3 = new customer();
            button3.ShowDialog();
        }

        private void rep_Click(object sender, EventArgs e)
        {
            REPOSITORY button4 = new REPOSITORY();
            button4.ShowDialog();
        }

        private void bill_Click(object sender, EventArgs e)
        {
            bill button5 = new bill();
            button5.ShowDialog();
        }
    }
}
