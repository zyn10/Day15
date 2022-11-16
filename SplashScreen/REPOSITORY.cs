using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SplashScreen
{
    public partial class REPOSITORY : Form
    {
        readonly string connectionString = "Data Source=(LocalDB)\\MSSQLLocalDB;Initial Catalog=PMS;Integrated Security=True;Pooling=False";
        public REPOSITORY()
        {
            InitializeComponent();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            this.Hide();
            Form menu = new Menu();
            menu.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            insertData();
        }
        private void insertData()
        {
            string insertString = "Insert Into REPOSITORY (Rep_Id,Med_name,Quantity) " +
                "Values('" + textBox3.Text + "','" + textBox6.Text + "','" + textBox7.Text + "')";
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand(insertString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();

            if (i != 0)
            {
                MessageBox.Show("Data Saved Successfully");
            }
        }

        private void getRecord()
        {
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand("SELECT * FROM REPOSITORY", newConnection);
            DataTable dt = new DataTable();
            newConnection.Open();
            SqlDataReader sdr = newCommand.ExecuteReader();
            dt.Load(sdr);
            newConnection.Close();
            dataGridView1.DataSource = dt;
        }

        private void button3_Click(object sender, EventArgs e)
        {
            getRecord();
        }

        private void med_Click(object sender, EventArgs e)
        {
            deleteData();
        }
        private void deleteData()
        {
            string deleteString = "delete from REPOSITORY where Rep_Id= '" + textBox3.Text + "'";
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand(deleteString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();

            if (i != 0)
            {
                MessageBox.Show("Removed Successfully");
            }
        }
        private void updateData()
        {
            string updateString = null;
            if (textBox6.Text != "" && textBox7.Text != "")
            {
                updateString = "update REPOSITORY " +
                    "set Med_name = '" + textBox6.Text + "',Quantity = '" + textBox7.Text + "'" +
                    "where Rep_Id = '" + textBox3.Text + "'";
            }
            else if (textBox6.Text != "" && textBox7.Text == "")
            {
                updateString = "update REPOSITORY " +
                    "set Med_name = '" + textBox6.Text + "'" +
                    "where Rep_Id = '" + textBox3.Text + "'";
            }
            else if (textBox6.Text == "" && textBox7.Text != "")
            {
                updateString = "update REPOSITORY " +
                    "set Quantity = '" + textBox7.Text + "'" +
                    "where Rep_Id = '" + textBox3.Text + "'";
            }
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand(updateString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();

            if (i != 0)
            {
                MessageBox.Show("Updated Successfully");
            }
        }

        private void button1_Click(object sender, EventArgs e)
        {
            updateData();
        }
    }
}
