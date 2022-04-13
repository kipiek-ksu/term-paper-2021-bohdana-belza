program ttyf1;
  var a:array[1..20] of real; 
      p:boolean; 
      l,d,i,j,n: integer; 
      c:real;
begin
randomize;
write('n=');readln(n);
for i:=1 to n do a[i]:=random(100)*0.1;

for i:=1 to n do write(a[i]:5:2);
writeln;

d:=n div 2; 
while d>0 do
begin
  for j:=d+1 to N do 
  begin
    l:=j-d;		
    repeat
      p:=false;		
      if a[l]<a[l+d] then begin 
        c:=a[l];a[l]:=a[l+d];a[l+d]:=c; 
        l:=l-d;				
        p:=true;			
      end;
    until (l<=1) and not(p);	
  end;
  d:=d div 2;		
  				
for i:=1 to n do write(a[i]:5:2);
writeln;
end;

for i:=1 to n do write(a[i]:5:2);
writeln;

readln;
end.