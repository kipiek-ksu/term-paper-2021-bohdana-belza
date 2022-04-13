program p_3_28;
type Tmass = array [1..15] of integer;
var gnomes :Tmass; birds : Tmass ; animals : Tmass; s_gnomes, s_animals, s_birds, i,n : integer; s : string;
procedure r_mass (n : integer; var mass : Tmass);
var i:integer;
begin
  for i:=1 to n do read (mass[i]);
end;
procedure max_el (mass:Tmass; var M: integer);
var i:integer;
begin
  M:= mass[1];
  for i:= 1 to 15 do if mass[i]> M then M:= mass [i];
end;
procedure s_mass (mass:Tmass; var M : integer);
var i : integer;
begin
  M:=0;
  for i := 1 to 15 do M := M + mass [i];
end;
procedure max3 (a,b,c:integer; var d:integer);
begin
if a>b then if a>c then d:=a
                   else d:=c
            else if b>c then d:=b
                        else d:=c;
end;
procedure s_el (a,b,c : Tmass; n:integer; var el_text:string);
var i : integer;
begin
  for i:=1 to 15 do if a[i] = n then el_text := 'gnomes';
  for i:=1 to 15 do if b[i] = n then el_text := 'animals';
  for i:=1 to 15 do if c[i] = n then el_text := 'birds';
end;
begin
  readln (n);
  r_mass (n,gnomes);
  readln (n);
  r_mass (n,animals);
  readln (n);
  r_mass (n,birds);
  max_el (gnomes,s_gnomes);
  max_el (birds,s_birds);
  max_el (animals,s_animals);
  max3 (s_gnomes,s_birds,s_animals,n);
  s_el (gnomes,animals,birds,n,s);
  s_mass (gnomes,s_gnomes);
  s_mass (birds,s_birds);
  s_mass (animals,s_animals);
  max3 (s_gnomes,s_birds,s_animals,n);
  if s_gnomes = n then writeln ('gnomes');
  if s_animals = n then writeln ('animals');
  if s_birds = n then writeln ('birds');
  writeln (s);
end.