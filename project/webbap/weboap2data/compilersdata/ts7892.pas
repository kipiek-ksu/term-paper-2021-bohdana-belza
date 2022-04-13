program l12;
var a: array [1..15,1..15] of integer;
b: array[1..256] of integer;
N,M,i,j: integer;
begin
read(M,N);
for i:=1 to M do begin
for j:=1 to N do read(a[i,j]);
end;
for i:=1 to M do begin
 b[i]=1 ;
for j:=1 to N do 
b[i]:=b[i]*a[i,j];
end;
for i:=1 to M do read(b[i],' ');
end.