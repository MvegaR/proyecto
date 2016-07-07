package gui;

import java.io.IOException;
import java.io.OutputStream;

import javax.swing.JTextArea;

public class MyOut extends OutputStream{

    private JTextArea texto;


    public MyOut(JTextArea salida) {
	this.texto = salida;
    }

    public void write(int b) throws IOException {
	texto.append(String.valueOf((char)b)); 
	texto.setCaretPosition(texto.getDocument().getLength());
    }


}
