#include "stdio.h"
#include "stdlib.h"
#include "complex.h"
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
	
	ld V[200];
	ld I[200];
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
	
	lond double d; // distance

	lamda = 2 * M_PI / beta;
	Vmax = 1 + volRef_mag;
	Vmin = 1 - volRef_mag;
	VSWR = Vmax / Vmin;
	// we will increase d from o to lambda and then take all the values and then store them in an array and give them as json
	
	d = lamda;
	while( d != 0) {

		if(d < 0) {
			d = 0;
		}
	}
	return 0;
}
