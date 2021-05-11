#include <stdio.h>

int main() {
	int Array[5] = {1,2,2,4,4};
	for(int i=0;i<sizeof(Array)/sizeof(int)-1;i++) {
		for(int j=i+1;j<sizeof(Array)/sizeof(int);j++) {
			if(Array[i] == Array[j]) {
				printf("%d\t", Array[i]);
			}
		}
		
	}
	return 0;
}
