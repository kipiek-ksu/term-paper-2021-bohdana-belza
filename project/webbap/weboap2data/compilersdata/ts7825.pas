Program _11_14;
const
     m=100;
type
    Pupil=record
               surnamei:string[40];
                namei:string[40];
            firsti_name:string[40];
                streeti:string[40];
                house:word;
                flati:word;
    end;
    type Class=array[1..m] of Pupil;
    var
       A:Class;
       name:string[40];
       n,i:integer;
    begin
         read(name);
         read(n);
         for i:=1 to n do
         with A[i] do
         begin
              read(surnamei);
              read(namei);
              read(first_namei);
              read(streeti);
              read(housei);
              read(flati);
         end;
    for i:=1 to n do
        if A[i].name=name then
        with A[i] do
        begin
             write(surnamei);
             write(namei);
             write(first_namei);
             write(streeti);
             writen(housei);
             write(flati);
        end;
end.