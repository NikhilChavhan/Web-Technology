package login;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;


public class Login extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");    //set response content type
		PrintWriter pout = response.getWriter();   //get object for writing
		String username = request.getParameter("username");   //get value of username field
		String password = request.getParameter("password");   //get value of password field
		try {
			//load the database driver
			Class.forName("com.mysql.jdbc.Driver");
			//establish the database connection
			Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test","root","root");
			//write the sql query
			PreparedStatement pst = conn.prepareStatement("select *from users where username=? and password=?");
			//bind the values with query parameters
			pst.setString(1, username);
			pst.setString(2, password);
			//execute the query and return cursor
			ResultSet rst = pst.executeQuery();
			if(rst.next()) { //move the cursor and check whether another row present
				//send the request to welcome servlet
				RequestDispatcher rd = request.getRequestDispatcher("welcome");
				rd.forward(request, response);
			}else {
				pout.println("Username or password is wrong!!");
				RequestDispatcher rd = request.getRequestDispatcher("login.html");
				rd.include(request, response);
			}
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
	}

}