package logica;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
public class Sha1 {
    
    public static class HashTextTest {
	 
	    /**
	     * @param args
	     * @throws NoSuchAlgorithmException 
	     */
	/*public static void main(String[] args) throws NoSuchAlgorithmException {
	        System.out.println(sha1("Admin"));
	    }*/
	     
	    public static String sha1(String input) {
	        MessageDigest mDigest;
		try {
		    mDigest = MessageDigest.getInstance("SHA1");
		    byte[] result = mDigest.digest(input.getBytes());
		    StringBuffer sb = new StringBuffer();
		        for (int i = 0; i < result.length; i++) {
		            sb.append(Integer.toString((result[i] & 0xff) + 0x100, 16).substring(1));
		        }
		        return sb.toString();
		} catch (NoSuchAlgorithmException e) {
		    // TODO Auto-generated catch block
		    e.printStackTrace();
		}
		 return null;
	    }
	}

}