package logica;

public class Reloj {
    private Integer horas;
    private Integer minutos;
    private Integer segundos;

    public Reloj() {
	this.horas = 0;
	this.minutos = 0;
	this.segundos = 0;
    }
    
    public void aumenta(){
	this.segundos += 1;
	if(segundos == 60){
	    this.minutos += 1;
	    segundos = 0;
	}
	if(minutos == 60){
	    this.horas += 1;
	    minutos = 0;
	}
    }
    
    @Override
    public String toString() {
        return String.format("%02d:%02d:%02d", horas.intValue(),minutos.intValue(),segundos.intValue());
    }

}
