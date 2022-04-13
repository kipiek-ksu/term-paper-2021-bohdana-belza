Program pr18;
type Mas2=array[1..8, 1..8] of longint;
     Mas1=array[1..8] of integer;
Var New:Mas2; Old:Mas1;
    i, j:integer;

function step (a:integer;b:byte):longint;
         var i:byte; st:longint;
begin
st:=1;
for i:=1 to b do
st:=st*a;
step:=st;
end;

procedure vvod;
          var i:byte;
begin
    for i:=1 to 8 do
    read (old[i]);
end;

procedure Stepen;
          var i,j:byte;
          begin
              for i:=1 to 8 do
              for j:=1 to 8 do
              new[i,j]:=step(old[j],i-1);
          end;

procedure vivod;
          var i,j:byte;
begin
for i:=1 to 8 do
    begin
        for j:=1 to 8 do
        write (new[i,j],' ');
        writeln;
    end;
end;

begin
vvod;
step;
vivod;
end.