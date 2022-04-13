Program Lab_9_3;



Type
    TMass = array [1..100] of integer;

var
   mass: TMass;
   n: integer;
   P,S: byte;


procedure addmass(n: integer; var Mass: TMass);

var
   i: integer;

begin
     for i:= 1 to n do
     read(mass[i])
end;


procedure printmass(n: integer; var Mass: TMass);

var
   i: integer;

begin
     
     for i:= 1 to n do
     write(Mass[i],' ' );
     
end;


Procedure Sortmass(n: integer; var P,S: byte; var mass: TMass);

var
   i,j,k,b,r,l: integer;


begin
     P:=0;
     S:=0;
     for k:= 1 to (n-1) do
     begin
          b:=mass[k+1];
          If b < mass[k] then
          begin
               S:=S+1;
               l := 1;
               r := k;
               repeat
                     j:=(l+r) div 2;
                     If (b < mass[j]) then r:=j
                     else  l:=j+1;
               until (l = j);

               for i := k downto j do
               begin
                    mass[i+1] := mass[i];
                    P:=P+1
               end;

               mass[j] := b ;
               print_mass(n,mass);
          end;
     end;
end;


begin
     clrscr;
    
     read(n);

     addmass(n,mass);
     sortmass(n,P,S,mass);
     
  
     printmass(n,mass);
end.
