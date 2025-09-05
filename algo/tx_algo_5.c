#include "stdio.h"
#include "stdlib.h"
#include "float.h"
#include "math.h"

typedef long double ld;


ld convertToPositive(ld number) {
return number >= 0 ? number : -1*number;
}
int main(int argc, char *argv[]) { // alpha beta Z_0 volRef_mag volReg_phase V0_mag 

	ld V0;
	ld volRef_mag;
	ld volRef_phase;
	ld alpha ;
	ld beta;
	ld Z_0;
	ld lamda;
	
	long double V[100][2];
	long double I[100][2];
	
	ld VSWR;
	argc--;

	if(argc == 6) {
		alpha = convertToPositive(atof(argv['1']));
		beta = convertToPositive(atof(argv['2']));
		Z_0 = convertToPositive(atof(argv['3']));
		volRef_mag = convertToPositive(atof(argv[4]));
		volRef_phase = atof(argv[5]);
		V0 = convertToPositive(atof(argv[6]));
	}else {
		printf("Insuffiecient Args");
		return 0;
	}
	
	long double d; // distance

	lamda = 2 * M_PI / beta;
	long double Vmax = 1 + volRef_mag;
	long double Vmin = 1 - volRef_mag;
	VSWR = Vmax / Vmin;
	// we will increase d from o to lambda and then take all the values and then store them in an array and give them as json
	
	d = lamda;
		d = d/100;
		int count = 0;
	while( count != 100) {
		double delta = 1/100;
		V[count][0] = d;
		I[count][0] = d;
		V[count][1] = V0*sqrt(1+(volRef_mag*volRef_mag)+(2*volRef_mag*cos((2*beta*d)-volRef_phase)));
		I[count][1] = V[count][1]/Z_0;
		if(d < 0) {
			d = 0;
		}
		count++;
	}

	return 0;
}
