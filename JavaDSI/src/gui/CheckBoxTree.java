package gui;

import java.util.ArrayList;

import javax.swing.JCheckBox;

public class CheckBoxTree extends JCheckBox{
    //Checkbox que tiene padre y hijos.
    //El comentario es pensado para salas, pero es generico. (Falta todo lo grafico)
    private static final long serialVersionUID = 1L;
    private CheckBoxTree padre;  //puede ser null, solo si es facultad.
    private Integer tipo; // 0: Sala, 1: edificio, 2: departamento, 3: Facultad.
    private String codigo; //Codigo de la facultad, departamento, edifiico o sala. (en caso de salas)
    // private String nombre; //<-- cuando exista conexion con la DB y debe ser obtenido automaticamente por una funcion de esta clase setNombre().
    // agregar un boton dentro de esta clase para ocultar/mostrar hijos. que se pinte en el metodo paint, en la pos actual del checkbox
    private ArrayList<CheckBoxTree> hijos = new ArrayList<>();;
    
    public CheckBoxTree(Integer tipo, String codigo, CheckBoxTree padre) {
	super();
	this.tipo = tipo;
	this.codigo = codigo;
	this.padre = padre;
    }
    public CheckBoxTree(Integer tipo, String codigo) {
	super();
	this.tipo = tipo;
	this.codigo = codigo;
	this.padre = null;
    }
    
    public void marcarTodosLosHijos(){
	for(CheckBoxTree C: getHijos()){
	    C.setSelected(true);
	}
    }
    public void desmarcarTodosLosHijos(){
	for(CheckBoxTree C: getHijos()){
	    C.setSelected(false);
	}
    }
    public ArrayList<CheckBoxTree> getTodosLosHijosMarcados(){
	ArrayList<CheckBoxTree> r = new ArrayList<>();
	for(CheckBoxTree C: getHijos()){
	    if(C.isSelected()){
		r.add(C);
	    }
	}
	return r;
    }
    
    public CheckBoxTree getPadre() {
	return padre;
    }
    
    public void setPadre(CheckBoxTree padre) {
	
	this.padre = padre;
    }
    
    public ArrayList<CheckBoxTree> getHijos() {
	return hijos;
    }
    
    public void setTipo(Integer tipo) {
	this.tipo = tipo;
    }
    public void setCodigo(String codigo) {
	this.codigo = codigo;
    }
    public Integer getTipo() {
	return tipo;
    }
    public String getCodigo() {
	return codigo;
    }

}
