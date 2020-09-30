package register;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class Register
 */
//@WebServlet("/Register")
public class Register extends HttpServlet {
	private static final long serialVersionUID = 1L;

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		response.setContentType("text/html");
		PrintWriter pout = response.getWriter();
		String username = request.getParameter("username");
		String password = request.getParameter("password");
		String firstname = request.getParameter("firstname");
		String lastname = request.getParameter("lastname");
		String gender= request.getParameter("gender");
		String email = request.getParameter("email");
		String mobile= request.getParameter("mobile");
		String clas = request.getParameter("clas");
		String department = request.getParameter("department");
		String age = request.getParameter("age");
		String address = request.getParameter("address");
		String[] subject = request.getParameterValues("subject");
		String sub="";
		sub = String.join(", ", subject);
		
		try {
			Class.forName("com.mysql.jdbc.Driver");
			Connection conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/test","root","root");
			PreparedStatement pst = conn.prepareStatement("insert into users (username,password,firstname,lastname,gender,email,mobile,clas,departement,age,address,subject) values (?,?,?,?,?,?,?,?,?,?,?,?)");
			pst.setString(1, username);
			System.out.println(username);
			pst.setString(2, password);
			pst.setString(3, firstname);
			pst.setString(4, lastname);
			pst.setString(5, gender);
			pst.setString(6, email);
			pst.setString(7, mobile);
			pst.setString(8, clas);
			pst.setString(9, department);
			pst.setString(10, age);
			pst.setString(11, address);
			pst.setString(12, sub);
			int rows = pst.executeUpdate();
			if(rows>0) {
				pout.println("You are registered successfully!! Now Login");
				RequestDispatcher rd = request.getRequestDispatcher("login.html");
				rd.include(request, response);
			}else {
				pout.println("Can't Register");
				RequestDispatcher rd = request.getRequestDispatcher("login.html");
				rd.include(request, response);
			}
		} catch (Exception e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}