using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace SplashScreen
{
    public partial class medicine : Form
    {
        readonly string connectionString = "Data Source=(LocalDB)\\MSSQLLocalDB;Initial Catalog=PMS;Integrated Security=True;Pooling=False";
        SqlConnection newConnection;

        public medicine()
        {
            InitializeComponent();
        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {
            insertData();
        }
        private void insertData()
        {
            string insertString = "INSERT INTO MEDICINE (Med_Id,Med_name,Manufacturing_date,Expiry_date,Quantity,Price_per_unit,Company_name) " +
                "Values('" + textBox1.Text + "','" + textBox3.Text + "','" + dateTimePicker1.Value.ToString("MM/dd/yyyy") + "'," +
                "'" + dateTimePicker2.Value.ToString("MM/dd/yyyy") + "','" + textBox6.Text + "','" + textBox7.Text + "','" + textBox8.Text + "')";
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand(insertString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();

            if (i != 0)
            {
                MessageBox.Show("DATA SAVED SUCCESSFULLY!");
                textBox1.Text = textBox3.Text  = textBox6.Text = textBox7.Text = textBox8.Text = "";
            }
        }
        private void getRecord()
        {
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand("SELECT * FROM MEDICINE", newConnection);
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

        
        private void button4_Click(object sender, EventArgs e)
        {
             DateTime startdate = dateTimePicker1.Value;
             DateTime enddate = dateTimePicker2.Value;
            calculateAge(startdate, enddate);
        }

        public void calculateAge(System.DateTime Startdate, System.DateTime EndDate)
        {
            if (EndDate.Year < Startdate.Year)
            {
                textBox2.Text = "INVALID DATE";
                return;
            }
            if (EndDate.Year == Startdate.Year)
            {
                if(EndDate.Month<Startdate.Month)
                {
                    textBox2.Text = "INVALID DATE";
                    return;
                }
            }
            if(EndDate.Month==Startdate.Month && EndDate.Year==Startdate.Year)
            {
                if(EndDate.Date<Startdate.Date)
                {
                    textBox2.Text = "INVALID DATE";
                    return;
                }
            }
                int year = (EndDate.Year - Startdate.Year);
                int month = (EndDate.Month - Startdate.Month);
                int day = (EndDate.Day - Startdate.Day);
                if (year <= 0 && month <= 0)
                {
                    textBox2.Text = day + " DAYS";
                }
                else if (month <= 0 && day <= 0)
                {
                    textBox2.Text = year + " YEARS";
                }
                else if (year <= 0 && day <= 0)
                {
                    textBox2.Text = month + " MONTHS";
                }
                else if (day <= 0)
                {
                    textBox2.Text = year + " YEARS " + month + " MONTHS";
                }
                else if (month <= 0)
                {
                    textBox2.Text = year + " YEARS " + day + " DAYS";
                }
                else if (year <= 0)
                {
                    textBox2.Text = month + " MONTHS " + day + " DAYS";
                }
                else
                {
                    textBox2.Text = year + " YEARS " + month + " MONTHS " + day + " DAYS";
                }
        }
        private void deleteData()
        {
            string deleteString = "delete from MEDICINE where Med_id= '" + textBox1.Text + "'";
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand(deleteString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();

            if (i != 0)
            {
                MessageBox.Show("Removed Successfully");
                textBox1.Text = textBox3.Text = textBox6.Text = textBox7.Text = textBox8.Text = "";
            }
        }
        private void updateData()
        {
            string updateString = null;
            if (textBox1.Text == "")
            {       MessageBox.Show("ID NOT GIVEN");
            return;
            }
            if (textBox1.Text != "" && textBox3.Text != "" && textBox6.Text != "" && textBox7.Text != "" && textBox8.Text != "")
            {
                updateString = "update MEDICINE " +
                    "set Med_name = '" + textBox3.Text + "',Quantity = '" + textBox6.Text + "',Price_per_unit = '" + textBox7.Text + "',Company_name = '" + textBox8.Text + "'" +
                    "where Med_id = '" + textBox1.Text + "'";
                updatefunction(updateString);
            }
            if (textBox3.Text != "")
            {
                updateString = "update MEDICINE " +
                    "set Med_name = '" + textBox3.Text + "'" +
                    "where Med_id = '" + textBox1.Text + "'";
                updatefunction(updateString);
            }

            if (textBox6.Text != "")
            {
                updateString = "update MEDICINE " +
                    "set Quantity = '" + textBox6.Text + "'" +
                    "where Med_id = '" + textBox1.Text + "'";
                updatefunction(updateString);
            }
            if (textBox7.Text != "")
            {
                updateString = "update MEDICINE " +
                    "set Price_per_unit = '" + textBox7.Text + "'" +
                    "where Med_id = '" + textBox1.Text + "'";
                updatefunction(updateString);
            }
            if (textBox8.Text != "")
            {
                updateString = "update MEDICINE " +
                    "set Company_name = '" + textBox8.Text + "'" +
                    "where Med_id = '" + textBox1.Text + "'";
                updatefunction(updateString);
            }
        }
        void updatefunction(string updateString)
        {
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand(updateString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();
            
            if (i != 0)
            {
                MessageBox.Show("Updated Successfully");
                textBox1.Text = textBox3.Text = textBox6.Text = textBox7.Text = textBox8.Text = "";
            }
        }
        private void button1_Click(object sender, EventArgs e)
        {
            updateData();
        }

        private void med_Click(object sender, EventArgs e)
        {
            deleteData();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            this.Hide();
            Form menu = new Menu();
            menu.Show();
        }
    }
}
