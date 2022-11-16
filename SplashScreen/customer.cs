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


    public partial class customer : Form
    {
        readonly string connectionString = "Data Source=(LocalDB)\\MSSQLLocalDB;Initial Catalog=PMS;Integrated Security=True;Pooling=False";
        SqlConnection newConnection;
        public customer()
        {
            InitializeComponent();
            using (SqlConnection cnn = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;Initial Catalog=PMS;Integrated Security=True;Pooling=False"))
            {
                SqlDataAdapter da = new SqlDataAdapter("select Med_name from MEDICINE", cnn);
                DataSet ds = new DataSet();
                da.Fill(ds, "MEDICINE");

                List<string> medNames = new List<string>();
                foreach (DataRow row in ds.Tables["MEDICINE"].Rows)
                {
                    medNames.Add(row["Med_name"].ToString());
                }
                foreach (string n in medNames)
                    checkedListBox1.Items.Add(n);
            }
        }

        private void panel1_Paint(object sender, PaintEventArgs e)
        {

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
            string insertString = "INSERT INTO CUSTOMER (Customer_name,DOB,Phone,Address) " +
                "Values('" + textBox3.Text + "','" + dateTimePicker1.Value.ToString("MM/dd/yyyy") + "'," +
                "'" + textBox6.Text + "','" + textBox7.Text + "')";
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand(insertString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();
            newConnection = new SqlConnection(connectionString);
            newCommand = new SqlCommand("SELECT TOP 1 * FROM CUSTOMER ORDER BY Ref_Id DESC", newConnection);
            
            newConnection.Open();
            int Ref_Id = 0;
            SqlDataReader rdr = newCommand.ExecuteReader();
            if(rdr.Read())
            {
                Ref_Id = Convert.ToInt32(rdr[0].ToString());
            }
            newConnection.Close();
            if (Ref_Id > 0)
            {
                foreach (string name in checkedListBox1.CheckedItems)
                {
                    insertString = "INSERT INTO REFERENCE_TABLE (Ref_Id,Med_Name) " +
                    "Values('" + Ref_Id + "','" + name + "')";
                    newConnection = new SqlConnection(connectionString);
                    newCommand = new SqlCommand(insertString, newConnection);
                    newConnection.Open();
                    i = newCommand.ExecuteNonQuery();
                    newConnection.Close();
                }
            }
            if (i != 0)
            {
                MessageBox.Show("DATA SAVED SUCCESSFULLY!");
                checkedListBox1.Text = textBox3.Text = textBox6.Text = textBox7.Text = "";
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            getRecord();
        }
        private void getRecord()
        {
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand("SELECT Ref_Id FROM CUSTOMER WHERE Customer_name = '" + textBox3.Text + "'", newConnection);

            newConnection.Open();
            int Ref_Id = 0;
            SqlDataReader rdr = newCommand.ExecuteReader();
            if (rdr.Read())
            {
                Ref_Id = Convert.ToInt32(rdr[0].ToString());
            }
            newConnection.Close();

            newConnection = new SqlConnection(connectionString);
            using (SqlCommand cmd = newConnection.CreateCommand())
            {
                newConnection.Open();
                cmd.CommandText = "SELECT * FROM CUSTOMER LEFT JOIN REFERENCE_TABLE ON CUSTOMER.Ref_Id = '" + Ref_Id + "'";
                SqlDataAdapter adap = new SqlDataAdapter(cmd);
                DataSet ds = new DataSet();
                adap.Fill(ds);
                dataGridView1.DataSource = ds.Tables[0].DefaultView;
            }


        }

        private void button1_Click(object sender, EventArgs e)
        { 
            updateData();
        }

        private void checkedListBox1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }
        private void updateData()
        {
            string updateString = null;
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand("SELECT Ref_Id FROM CUSTOMER WHERE Customer_name = '" + textBox3.Text + "'", newConnection);

            newConnection.Open();
            int Ref_Id = 0;
            SqlDataReader rdr = newCommand.ExecuteReader();
            if (rdr.Read())
            {
                Ref_Id = Convert.ToInt32(rdr[0].ToString());
            }
            newConnection.Close();
           
            if (textBox3.Text != "" && textBox6.Text != "" && textBox7.Text != "")
            {
                updateString = "update CUSTOMER " +
                    "set Customer_name = '" + textBox3.Text + "',Phone = '" + textBox6.Text + "',Address = '" + textBox7.Text + "'" +
                    "where Ref_Id = '" + Ref_Id + "'";
                updatefunction(updateString);

                foreach (string name in checkedListBox1.CheckedItems)
                {
                    updateString = "update REFERENCE_TABLE" +
                    "set Med_Name = '" + name + "'" +
                    "where Ref_Id = '" + Ref_Id + "'";
                    updatefunction(updateString);

                }

            }
            /*if (textBox3.Text != "")
            {
                updateString = "update CUSTOMER " +
                    "set Customer_name = '" + textBox3.Text + "'" +
                    "where Ref_Id = '" + Ref_Id + "'";
                updatefunction(updateString);
            }*/
            if (textBox3.Text!="" && textBox6.Text != "")
            {
                updateString = "update CUSTOMER " +
                    "set Phone = '" + textBox6.Text + "'" +
                    "where Ref_Id = '" + Ref_Id + "'";
                updatefunction(updateString);
            }
            if (textBox3.Text != "" && textBox7.Text != "")
            {
                updateString = "update CUSTOMER " +
                    "set Address = '" + textBox7.Text + "'" +
                    "where Ref_Id = '" + Ref_Id + "'";
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
                textBox3.Text = textBox6.Text = textBox7.Text = "";
            }
        }
        private void deleteData()
        {
            SqlConnection newConnection = new SqlConnection(connectionString);
            SqlCommand newCommand = new SqlCommand("SELECT Ref_Id FROM CUSTOMER WHERE Customer_name = '" + textBox3.Text + "'", newConnection);

            newConnection.Open();
            int Ref_Id = 0;
            SqlDataReader rdr = newCommand.ExecuteReader();
            if (rdr.Read())
            {
                Ref_Id = Convert.ToInt32(rdr[0].ToString());
            }
            newConnection.Close();

            string deleteString = "delete from REFERENCE_TABLE where Ref_Id= '" + Ref_Id + "'";
            newConnection = new SqlConnection(connectionString);
            newCommand = new SqlCommand(deleteString, newConnection);
            newConnection.Open();
            int i = newCommand.ExecuteNonQuery();
            newConnection.Close();

            deleteString = "delete from CUSTOMER where Ref_Id= '" + Ref_Id + "'";
            newConnection = new SqlConnection(connectionString);
            newCommand = new SqlCommand(deleteString, newConnection);
            newConnection.Open();
            i = newCommand.ExecuteNonQuery();
            newConnection.Close();

            if (i != 0)
            {
                MessageBox.Show("Removed Successfully");
                textBox3.Text = "";
            }
        }

        private void med_Click(object sender, EventArgs e)
        {
            deleteData();
        }
    }
}